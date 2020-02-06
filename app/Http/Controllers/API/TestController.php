<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function index ($plan_id) {

         return Test::where('plan_id', $plan_id)->get();
    }

    public function show ($id) {
        // return User::findOrFail($id)->toJson();
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
        dd($request);
        return response('OK', 200);
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
