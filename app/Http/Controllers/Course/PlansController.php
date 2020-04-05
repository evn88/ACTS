<?php

namespace App\Http\Controllers\Course;

use App\Plan;
use App\Http\Controllers\Controller;


class PlansController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        $plans = Plan::findOrFail($id);
        return view('course.plans', compact('plans'));
    }


}
