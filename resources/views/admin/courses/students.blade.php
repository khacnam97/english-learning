@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Students Enrolled in: {{ $course->title }}</h3>

        @if($course->users->isEmpty())
            <p>No students have enrolled in this course yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Enrolled At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($course->users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->pivot->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
