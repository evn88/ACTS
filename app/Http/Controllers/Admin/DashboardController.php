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
        $users = User::all();

        foreach ($users as &$user) {
            $test_pass = 0;
            $test_fail = 0;
            $percent_pass = 0;
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
                    }
                }
            }

            $user->tests_count = ($user->useranswers->count());
            if($user->tests_count > 0){
                $percent_pass = round($test_pass / $user->tests_count * 100);
            }
            $user->percent_pass = $percent_pass;
            $user->tests_pass = $test_pass;
            $user->tests_fail = $test_fail;
        }

//        foreach ($groups as &$group) {
//            $test_pass = 0;
//            $test_fail = 0;
//            $percent_pass = 0;
//            $test_count = 0;
////            dd($group);
//            foreach ($group->plans as $plan) {
//                foreach ($plan->tests as $p){
//                    dd($p);
//                }
//                $test = Test::where('plan_id', $plan->id)
//                    ->join('useranswers', 'tests.id', '=', 'useranswers.test_id')->get();
////                    ->where('useranswers.user_id','=', $user->id)->get();
//
//                foreach ($test as $t){
//                    $t->setVisible(['trueAnswer']);
//                    if($t->trueAnswer === $t->answers){
//                        $test_pass++;
//                    } else {
//                        $test_fail++;
//                    }
//                    $test_count++;
//                }
//            }
//            $group->tests_count = $test_count;
//
//            $group->tests_pass = $test_pass;
//            $group->tests_fail = $test_fail;
//        }

        return view('admin.dashboard', compact('groups', 'users'));
    }
}
