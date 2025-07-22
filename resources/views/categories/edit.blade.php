@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>{{ isset($category) ? 'Edit' : 'Add' }} Category</h2>

        <form method="POST" action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
            </div>

            <button type="submit" class="btn btn-success">
                {{ isset($category) ? 'Update' : 'Create' }}
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
