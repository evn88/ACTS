<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function index () {
        // return User::with('groups')->get();
    }

    public function show ($id) {
        // return User::findOrFail($id)->toJson();
    }

    public function store (Request $request) {

        // $lesson = Test::create($request->all());
        // $lesson->save();


        $answers = json_decode($request->answers, true);
        $question = json_decode($request->question, true);
        $trueAnswers = json_decode($request->trueAnswers, true);

        $test = new Test;
        $test->plan_id = 7;
        $test->name = 'test';
        $test->question = $question;
        $test->answer = json_encode($answers);
        $test->save();

        return response([$answers,$question,$trueAnswers], 200);
    }

    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
