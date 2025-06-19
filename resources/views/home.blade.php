<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="container">
            <h1>Welcome to English Learning</h1>
            <p class="lead">Learn English from anywhere, anytime</p>
            <a href="/courses" class="btn btn-light btn-lg mt-3">Browse Courses</a>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Latest Courses</h2>
            <div class="row">
                @forelse($courses as $course)
                    <div class="col-md-4 mb-4">
                        <div class="card course-card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                                <span class="badge bg-primary">{{ ucfirst($course->level) }}</span>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="{{ route('courses.show', $course->id) }}"class="btn btn-outline-primary btn-sm">View Course</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No courses available.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
