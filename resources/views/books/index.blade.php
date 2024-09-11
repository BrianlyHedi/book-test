@extends('layout')

@section('content')
    <div class="container">
        <h1 class="mb-4">Books List</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Add New Book
        </a>

        @if($books->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> No books found. Please add a new book.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Slug</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->years }}</td>
                            <td>{{ $book->slug }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $books->links() }}
        @endif
    </div>
@endsection
