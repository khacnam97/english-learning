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
use Illuminate\Support\Facades\Storage;

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
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'video' => 'nullable|file|mimetypes:video/mp4,video/mpeg',
            'pdf' => 'nullable|file|mimes:pdf',
            'audio' => 'nullable|file|mimetypes:audio/mpeg,audio/mp3',
        ]);

        $data = $request->only(['title', 'description', 'course_id']);

        if ($request->hasFile('video')) {
            $data['video_path'] = $request->file('video')->store('lessons/videos', 'public');
        }

        if ($request->hasFile('pdf')) {
            $data['pdf_path'] = $request->file('pdf')->store('lessons/pdfs', 'public');
        }

        if ($request->hasFile('audio')) {
            $data['audio_path'] = $request->file('audio')->store('lessons/audios', 'public');
        }

        Lesson::create($data);

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

    public function show1(Lesson $lesson)
    {
        return view('lessons.show1', compact('lesson'));
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
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'video' => 'nullable|file|mimetypes:video/mp4,video/mpeg',
            'pdf' => 'nullable|file|mimes:pdf',
            'audio' => 'nullable|file|mimetypes:audio/mpeg,audio/mp3',
        ]);

        $data = $request->only(['title', 'description', 'course_id']);

        if ($request->hasFile('video')) {
            if ($lesson->video_path) {
                Storage::disk('public')->delete($lesson->video_path);
            }
            $data['video_path'] = $request->file('video')->store('lessons/videos', 'public');
        }

        if ($request->hasFile('pdf')) {
            if ($lesson->pdf_path) {
                Storage::disk('public')->delete($lesson->pdf_path);
            }
            $data['pdf_path'] = $request->file('pdf')->store('lessons/pdfs', 'public');
        }
        if ($request->hasFile('audio')) {
            if ($lesson->audio_path) {
                Storage::disk('public')->delete($lesson->audio_path);
            }
            $data['audio_path'] = $request->file('audio')->store('lessons/audios', 'public');
        }

        $lesson->update($data);

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
