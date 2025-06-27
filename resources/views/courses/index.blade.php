@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Courses</h2>

        @if(Auth::user()->role === 'admin')
            <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">+ Add Course</a>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card course-card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p>{{ Str::limit($course->description, 100) }}</p>
                            <p><strong>Level:</strong> {{ ucfirst($course->level) }}</p>

                            {{-- Hiển thị bài học --}}
                            @if($course->lessons->count())
                                <hr>
                                <h6>Lessons:</h6>
                                <ul class="list-unstyled small">
                                    @foreach($course->lessons->take(3) as $lesson)
                                        <li>
                                            <i class="fas fa-book-open me-1 text-primary"></i>
                                            <a href="{{ route('lessons.show1', $lesson->id) }}" class="text-decoration-none">
                                                {{ $lesson->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                    @if($course->lessons->count() > 3)
                                        <li><a href="{{ route('courses.show', $course->id) }}" class="text-decoration-none">+ More lessons</a></li>
                                    @endif
                                </ul>
                            @else
                                <p class="text-muted small">No lessons yet</p>
                            @endif

                            <div class="mt-auto">
                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete course?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif

                                @auth
                                    @if(auth()->user()->courses->contains($course->id))
                                        <form action="{{ route('courses.unenroll', $course->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Unenroll</button>
                                        </form>
                                    @else
                                        <form action="{{ route('courses.enroll', $course->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            <button class="btn btn-success btn-sm">Enroll</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $courses->links() }}
    </div>
@endsection
