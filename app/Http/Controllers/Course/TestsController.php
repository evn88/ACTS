<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($plan_id)
    {
        $plan = Plan::findOrFail($plan_id);
        return view('course.tests', compact('plan'));
    }
}
