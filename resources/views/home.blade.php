@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero d-flex align-items-center text-center text-white" style="background: linear-gradient(135deg, #007bff, #00c6ff); height: 60vh;">
        <div class="container">
            <h1 class="display-4 fw-bold">Welcome to <span class="text-warning">English Learning</span></h1>
            <p class="lead">Learn English from anywhere, at any time — at your own pace.</p>
            <a href="/courses" class="btn btn-warning btn-lg mt-3 shadow">Browse Courses</a>
        </div>
    </section>

    <!-- Latest Courses Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Latest Courses</h2>

            @if($courses->count())
                <div class="row g-4">
                    @foreach($courses as $course)
                        <div class="col-md-4">
                            <div class="card course-card h-100 border-0 shadow-sm hover-shadow">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">{{ $course->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($course->description, 100) }}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="badge bg-primary">{{ ucfirst($course->level) }}</span>
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted">No courses available at the moment.</p>
            @endif
        </div>
    </section>
@endsection
