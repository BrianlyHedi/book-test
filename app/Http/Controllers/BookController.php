<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Menggunakan paginate() agar pagination berfungsi
        $books = Book::paginate(10); // Angka 10 menentukan jumlah item per halaman
        return view('books.index', compact('books'));
    }


    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'years' => 'required',
            'slug' => 'required|unique:books',
            'author' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
                         ->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'years' => 'required',
            'slug' => 'required|unique:books,slug,' . $book->id,
            'author' => 'required',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
                         ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
                         ->with('success', 'Book deleted successfully.');
    }
}
