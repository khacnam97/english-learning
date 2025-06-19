<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseManagementController extends Controller
{
    public function students($id)
    {
        $course = Course::with('users')->findOrFail($id);

        return view('admin.courses.students', compact('course'));
    }

    public function index($id)
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }
}
