@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Course</h2>

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-control">
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection

