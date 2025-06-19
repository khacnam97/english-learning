@extends('layouts.admin')

@section('content')
    <h2>Lesson Details</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $lesson->title }}</h4>
            <p><strong>Course:</strong> {{ $lesson->course->title ?? 'N/A' }}</p>
            <p><strong>Type:</strong> {{ ucfirst($lesson->type) }}</p>
            <p><strong>Content:</strong> {{ $lesson->content }}</p>
        </div>
    </div>

    <a href="{{ route('lessons.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
