@extends('layouts.admin')

@section('content')
    <h2>Edit Lesson</h2>

    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $lesson->title }}" required>
        </div>
        <div class="mb-3">
            <label>Course</label>
            <select name="course_id" class="form-select">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $lesson->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Video File (MP4)</label>
            <input type="file" name="video" class="form-control">
        </div>

        <div class="mb-3">
            <label>PDF File</label>
            <input type="file" name="pdf" class="form-control">
        </div>

        <div class="mb-3">
            <label>Audio File (MP3)</label>
            <input type="file" name="audio" class="form-control">
        </div>
        <div class="mb-3">
            <label>Content URL / Description</label>
            <textarea name="description" class="form-control">{{ $lesson->description }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
