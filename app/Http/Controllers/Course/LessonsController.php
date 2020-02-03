<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Lesson;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $next = Lesson::where('id', '>', $id)->where('plan_id', '=', $lesson->plan_id)->min('id');
        $plan_id = $lesson->plan_id;
        return view('course.lesson', compact('lesson', 'next', 'plan_id'));
    }
}
