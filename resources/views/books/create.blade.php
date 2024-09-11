@extends('layout')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add New Book</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter book name">
            </div>

            <div class="mb-3">
                <label for="years" class="form-label">Year</label>
                <input type="number" id="years" name="years" class="form-control" value="{{ old('years') }}" placeholder="Enter publication year">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Enter book slug">
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}" placeholder="Enter author name">
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Add Book</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
@endsection
