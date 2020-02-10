<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\Test;
use App\User;
use App\Useranswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\RowResult;

class DashboardController extends Controller
{
    public function index()
    {
        $groups = Group::all();
//        Test::where('plan_id', $plan_id)->join('useranswers', 'tests.id', '=', 'useranswers.test_id')->get()
        $users = User::all();



        foreach ($users as &$user) {
            $test_count = 0;
            $test_pass = 0;
            $test_fail = 0;
            $percent_pass = 0;
            foreach ($user->groups as $group){
                foreach ($group->plans as $plan){
                    $test = Test::where('plan_id', $plan->id)
                            ->join('useranswers', 'tests.id', '=', 'useranswers.test_id')
                            ->where('useranswers.user_id','=',$user->id)->get();
//                    $test_count += $test->count();

                    foreach ($test as $t){
                            $t->setVisible(['trueAnswer']);
                            if($t->trueAnswer === $t->answers){
                                $test_pass++;
                            } else {
                                $test_fail++;
                            }
                    }
                }
            }
//            dd($user->groups[0]->plans[0]->tests);


            $user->tests_count = ($user->useranswers->count());
            if($user->tests_count > 0){
                $percent_pass = round($test_pass / $user->tests_count * 100);
            }
            $user->percent_pass = $percent_pass;
            $user->tests_pass = $test_pass;
            $user->tests_fail = $test_fail;

        }
//        dd($users);
        return view('admin.dashboard', compact('groups', 'users'));
    }
}
