@extends('layouts.admin')

@section('content')
    <h2>Create New Lesson</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('lessons.store') }}" method="POST">
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
            <label>Type</label>
            <select name="type" class="form-select">
                <option value="video">Video</option>
                <option value="pdf">PDF</option>
                <option value="audio">Audio</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Content URL / Description</label>
            <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
