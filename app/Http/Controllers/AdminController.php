<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCourses = Course::count(); // Nếu bạn có model Course

        return view('admin.dashboard', compact('totalUsers', 'totalCourses'));
    }
}

