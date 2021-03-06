<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\SendAttackEmail;
use App\Mail\Attack;
use App\Useranswer;
use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{

    public function index ($plan_id) {
        $test = Test::where('plan_id', $plan_id)->whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('useranswers')
                ->where('user_id', '=', \Auth::user()->id)
                ->whereRaw('tests.id = test_id');
            })->first();

        return $test;
    }

    public function show ($test_id) {

        $test = Test::findOrFail($test_id);
        $test->makeVisible(['trueAnswer']);
        if($test) return $test;
        return response('Not Found', 404);
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

    public function update (Request $request, $test_id) {
        $test = Test::findOrFail($test_id);

        $test->name = substr(strip_tags($request->question), 0, 100).'...';
        $test->question = $request->question;
        $test->answer = $request->answers;
        $test->trueAnswer = $request->trueAnswers;
        $test->save();

        if($test && $test_id){
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
        $result['score'] = round($result['trueanswer'] / $result['questioncount'] * 100);

//        dispatch(new SendAttackEmail([
//            'username' => \Auth::user()->name,
//            'email' => \Auth::user()->email,
//            'html' => '<p>test test</p>'
//        ]))->delay(Carbon::now()->addMinutes(1));

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
