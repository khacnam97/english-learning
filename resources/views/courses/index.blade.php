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
                    <div class="card course-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p>{{ $course->description }}</p>
                            <p><strong>Level:</strong> {{ ucfirst($course->level) }}</p>
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
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $courses->links() }}
    </div>
@endsection
