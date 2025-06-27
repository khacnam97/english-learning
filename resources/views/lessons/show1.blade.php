@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">{{ $lesson->title }}</h2>

        {{-- Mô tả --}}
        @if($lesson->description)
            <p class="mb-4">{{ $lesson->description }}</p>
        @endif

        {{-- Video --}}
        @if($lesson->video_path)
            <div class="mb-4">
                <h5><i class="fas fa-video me-2"></i>Video</h5>
                <video controls width="100%" height="auto">
                    <source src="{{ asset('storage/' . $lesson->video_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif

        {{-- Audio --}}
        @if($lesson->audio_path)
            <div class="mb-4">
                <h5><i class="fas fa-headphones me-2"></i>Audio</h5>
                <audio controls>
                    <source src="{{ asset('storage/' . $lesson->audio_path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        @endif

        {{-- PDF --}}
        @if($lesson->pdf_path)
            <div class="mb-4">
                <h5><i class="fas fa-file-pdf me-2"></i>PDF Document</h5>
                <a href="{{ asset('storage/' . $lesson->pdf_path) }}" target="_blank" class="btn btn-outline-primary">
                    <i class="fas fa-eye me-1"></i> View PDF
                </a>
                <a href="{{ asset('storage/' . $lesson->pdf_path) }}" download class="btn btn-outline-secondary">
                    <i class="fas fa-download me-1"></i> Download
                </a>
            </div>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Back</a>
    </div>
@endsection
