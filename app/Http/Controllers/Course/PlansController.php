<?php

namespace App\Http\Controllers\Course;

use App\Plan;
use App\Http\Controllers\Controller;


class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::findOrFail();
        return view('course.plansinf', compact('plans'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plans = Plan::findOrFail($id);
        return view('course.plansinf', compact('plans'));
    }


}
