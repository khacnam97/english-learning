@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Course</th>
                <th>Enrollments</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->users->count() }}</td>
                    <td>
                        <a href="{{ route('admin.courses.students', $course->id) }}" class="btn btn-info btn-sm">View Students</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
