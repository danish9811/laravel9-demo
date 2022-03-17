<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {

    public function index() {
        return view('books', [
            'books' => Book::all()
        ]);
    }

    public function create() {
        return view('layout.modals');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher_id' => 'required',
            'isbn' => 'required',
            'price' => 'required'
        ]);

        Book::create($request->all());

        //return redirect('/books')->with('message', 'new record added');
        return response()->json([
            'location' => '/books',
            'message' => 'new book added successfully'
        ]);
    }

    public function show(Book $book) {
        //
    }

    public function edit(Book $book) {
        // return view('layout.modals', compact('book'));
        // return view('layout.modals', ['book' => Book::find($book['id'])]);
        return view('layout.modals', compact('book'));
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher_id' => 'required',
            'isbn' => 'required',
            'price' => 'required'
        ]);

        // Book::update($request->all());
        // Book::update($data);
        // Book::save($request->all());
        // Book::where('id', '=', $book['id'])->update($data);
        // Book::updateOrInsert($data);

        $book->update($request->all());

        // return redirect('/books');

        return redirect()
            ->route('books.index')
            ->with('message', 'book detailed edited successfully');
    }

    public function destroy(Book $book) {
        //
    }
}
