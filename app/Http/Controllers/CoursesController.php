<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function show()
    {
        $course = Courses::all();
        return $course;
    }
}
