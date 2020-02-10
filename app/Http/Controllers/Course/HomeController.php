<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test_pass = 0;
        $test_fail = 0;
        $percent_pass = 0;
        $username = Auth::getUser()->name;
        $user = User::find(Auth::getUser()->id);
        foreach ($user->groups as $group) {
            foreach ($group->plans as $plan) {
                $test = Test::where('plan_id', $plan->id)
                    ->join('useranswers', 'tests.id', '=', 'useranswers.test_id')
                    ->where('useranswers.user_id','=',$user->id)->get();

                foreach ($test as $t){
                    $t->setVisible(['trueAnswer']);
                    if($t->trueAnswer === $t->answers){
                        $test_pass++;
                    } else {
                        $test_fail++;
                    }
//                    $count++;
                }
            }
        }
        $count = ($user->useranswers->count());
        if($count > 0){
             $percent_pass = round($test_pass / $count * 100);
        }
        $user->percent_pass = $percent_pass;
        $user->tests_pass = $test_pass;
        $user->tests_fail = $test_fail;

        return view('course.home', compact('username','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        //
    }
}
