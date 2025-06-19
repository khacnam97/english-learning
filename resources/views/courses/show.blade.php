@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3>{{ $course->title }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong></p>
                <p>{{ $course->description }}</p>

                <p><strong>Instructor:</strong> {{ $course->instructor_name ?? 'N/A' }}</p>
                <p><strong>Enrolled Students:</strong> {{ $course->enrollments->count() }}</p>

                @auth
                    @if(Auth::user()->role !== 'admin')
                        @if(auth()->user()->courses->contains($course->id))
                            <form action="{{ route('courses.unenroll', $course->id) }}" class="d-inline"  method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">Unenroll</button>
                            </form>
                        @else
                            <form action="{{ route('courses.enroll', $course->id) }}" class="d-inline"  method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm">Enroll</button>
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
