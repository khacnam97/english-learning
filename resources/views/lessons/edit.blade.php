@extends('layouts.admin')

@section('content')
    <h2>Edit Lesson</h2>

    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
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
            <label>Type</label>
            <select name="type" class="form-select">
                <option value="video" {{ $lesson->type == 'video' ? 'selected' : '' }}>Video</option>
                <option value="pdf" {{ $lesson->type == 'pdf' ? 'selected' : '' }}>PDF</option>
                <option value="audio" {{ $lesson->type == 'audio' ? 'selected' : '' }}>Audio</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control">{{ $lesson->content }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
