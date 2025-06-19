<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll($courseId)
    {
        $user = Auth::user();
        $course = Course::findOrFail($courseId);

        if (!$user->courses->contains($courseId)) {
            $user->courses()->attach($courseId);
            return back()->with('success', 'You have enrolled in the course.');
        }

        return back()->with('info', 'You are already enrolled.');
    }

    public function unenroll($courseId)
    {
        $user = Auth::user();
        $course = Course::findOrFail($courseId);

        $user->courses()->detach($courseId);
        return back()->with('success', 'You have unenrolled from the course.');
    }
}
