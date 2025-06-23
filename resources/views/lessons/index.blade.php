@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lesson List</h2>
        <a href="{{ route('lessons.create') }}" class="btn btn-primary">+ Add Lesson</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Course</th>
            <th>Files</th>
            <th>Description</th>
            <th style="width: 150px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($lessons as $lesson)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lesson->title }}</td>
                <td>{{ $lesson->course->title ?? 'N/A' }}</td>
                <td>
                    @if($lesson->video_path)
                        <a href="{{ asset('storage/' . $lesson->video_path) }}" target="_blank" class="btn btn-sm btn-outline-primary mb-1">
                            <i class="fas fa-video"></i> Video
                        </a><br>
                    @endif
                    @if($lesson->pdf_path)
                        <a href="{{ asset('storage/' . $lesson->pdf_path) }}" target="_blank" class="btn btn-sm btn-outline-secondary mb-1">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a><br>
                    @endif
                    @if($lesson->audio_path)
                        <a href="{{ asset('storage/' . $lesson->audio_path) }}" target="_blank" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-headphones"></i> Audio
                        </a>
                    @endif
                </td>
                <td>{{ \Illuminate\Support\Str::limit($lesson->description, 80) }}</td>
                <td>
                    <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No lessons found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
