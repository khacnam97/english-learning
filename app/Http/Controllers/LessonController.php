<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $lessons = Lesson::with('course')->latest()->paginate(10);
        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $courses = Course::all();
        return view('lessons.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Lesson::create($request->all());
        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson
     * @return Application|Factory|View
     */
    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Lesson $lesson
     * @return Application|Factory|View
     */
    public function edit(Lesson $lesson)
    {
        $courses = Course::all();
        return view('lessons.edit', compact('lesson', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Lesson $lesson
     * @return RedirectResponse
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $lesson->update($request->all());
        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Lesson $lesson
     * @return RedirectResponse
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted.');
    }
}
