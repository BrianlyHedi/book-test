@extends('layout')

@section('content')
    <h1>Book Details</h1>

    <div>
        <strong>Name:</strong> {{ $book->name }}
    </div>

    <div>
        <strong>Year:</strong> {{ $book->years }}
    </div>

    <div>
        <strong>Slug:</strong> {{ $book->slug }}
    </div>

    <div>
        <strong>Author:</strong> {{ $book->author }}
    </div>

    <a href="{{ route('books.index') }}">Back to List</a>
    <a href="{{ route('books.edit', $book->id) }}">Edit Book</a>
    
    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Book</button>
    </form>
@endsection
