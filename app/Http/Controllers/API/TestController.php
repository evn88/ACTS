<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Useranswer;
use Illuminate\Http\Request;
use App\Test;
use App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index ($plan_id) {
        $test = Test::where('plan_id', $plan_id)->get();

         return $test;
    }

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

        return response($useranswer, 200);
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
