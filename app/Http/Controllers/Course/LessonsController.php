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

        return view('course.lesson', compact('lesson'));
    }
}
