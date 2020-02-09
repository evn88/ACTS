<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Useranswer;
use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function show ($plan_id) {
        $test = Test::where('plan_id', $plan_id)->whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('useranswers')
                ->where('user_id', '=', \Auth::user()->id)
                ->whereRaw('tests.id = test_id');
            })->first();

        return $test;
    }

    public function store (Request $request) {
        $test = new Test;

        $test->plan_id = $request->plan_id;
        $test->name = substr(strip_tags($request->question), 0, 100).'...';
        $test->question = $request->question;
        $test->answer = $request->answers;
        $test->trueAnswer = $request->trueAnswers;
        $test->save();

        if($test){
            return response('OK', 200);
        } else {
            return response('error', 500);
        }
    }

    public function storeanswer(Request $request)
    {

        $useranswer = Useranswer::create([
            'test_id' => $request->test_id,
            'user_id' => $request->user()->id,
            'answers' => $request->answers,
            'ip' => $request->ip()
        ]);
        $useranswer->save();

//        //проверяем остались ли тесты
//        $test_count = Test::where('plan_id', $request->plan_id)->whereNotExists(function ($query) {
//            $query->select(DB::raw(1))
//                ->from('useranswers')
//                ->where('user_id', '=', \Auth::user()->id)
//                ->whereRaw('tests.id = test_id');
//        })->count();
//
//        if($test_count > 0){
//            return response('OK', 200);
//        } else {
//            return response('false', 200);
//        }
    }

    public function result($plan_id)
    {
        $result['trueanswer'] = 0;
        $result['falseanswer'] = 0;
        $result['questioncount'] = 0;
        $result['score'] = 0;

        $test = Test::where('plan_id', $plan_id)->join('useranswers', 'tests.id', '=', 'useranswers.test_id')->get();
        $result['questioncount'] = $test->count();
        foreach ($test as $t){
            $t->setVisible(['trueAnswer']);
            if($t->trueAnswer === $t->answers){
                $result['trueanswer']++;
            } else {
                $result['falseanswer']++;
            }
        }
        $result['score'] = $result['trueanswer'] / $result['questioncount'] * 100;

        return $result;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        if($test->isAdmin()){
            return response('Forbidden', 403);
        }
        $test->delete();
        return response('OK', 200);
    }

}
