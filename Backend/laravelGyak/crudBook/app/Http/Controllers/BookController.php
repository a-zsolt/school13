<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();

        return view('books.index', ['books' => $books]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(StoreBookRequest $request) {
        Book::create($request->validated());

        return redirect()->route('books.index')->with('status', 'Könyv sikeresen létrehozva!');
    }

    public function edit ($id) {
        $book = Book::findOrFail($id);

        return view('books.edit', ['book' => $book]);
    }

    public function update(UpdateBookRequest $request, $id) {
        $book = Book::findOrFail($id);
        $book->update($request->validated());
        return redirect()->route('books.index')->with('status', 'Könyv sikeresen frissítve!');
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('status', 'Könyv törölve!');
    }
}
