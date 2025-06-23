@extends('layouts.admin')

@section('content')
    <h2>Create New Lesson</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Course</label>
            <select name="course_id" class="form-select" required>
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
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
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
