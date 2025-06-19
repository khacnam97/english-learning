@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lesson List</h2>
        <a href="{{ route('lessons.create') }}" class="btn btn-primary">+ Add Lesson</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Course</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lesson)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lesson->title }}</td>
                <td>{{ $lesson->course->title ?? 'N/A' }}</td>
                <td>{{ ucfirst($lesson->type) }}</td>
                <td>
                    <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure to delete this lesson?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
