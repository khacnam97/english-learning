@extends('layouts.admin')

@section('content')
    <h2>Lesson Details</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $lesson->title }}</h4>
            <p><strong>Course:</strong> {{ $lesson->course->title ?? 'N/A' }}</p>
            <p><strong>Type:</strong> {{ ucfirst($lesson->type) }}</p>
            <p><strong>Content:</strong> {{ $lesson->content }}</p>
            @if($lesson->video_path)
                <video controls width="100%">
                    <source src="{{ asset('storage/' . $lesson->video_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif

            @if($lesson->pdf_path)
                <a href="{{ asset('storage/' . $lesson->pdf_path) }}" target="_blank" class="btn btn-outline-secondary my-2">
                    View PDF
                </a>
            @endif

            @if($lesson->audio_path)
                <audio controls>
                    <source src="{{ asset('storage/' . $lesson->audio_path) }}" type="audio/mpeg">
                    Your browser does not support the audio tag.
                </audio>
            @endif
        </div>
    </div>

    <a href="{{ route('lessons.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
