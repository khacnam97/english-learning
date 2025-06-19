@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Course</h2>

        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $course->title }}" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $course->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-control">
                    <option value="beginner" {{ $course->level == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ $course->level == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ $course->level == 'advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

