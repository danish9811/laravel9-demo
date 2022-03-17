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
            'title' => 'required|min:5|max:35',
            'author' => 'required|min:7|max:60',
            'publisher_id' => 'required|min:10|max:30',
            'isbn' => 'required|min:10|max:40',
            'price' => 'required'
        ]);

        Book::create($request->all());

        return response()->json([
            'location' => '/books',
            'message' => 'book added successfully',
        ]);
    }

    public function show(Book $book) {
        //
    }

    public function edit(Book $book) {
        return view('layout.modals', compact('book'));
    }

    public function update(Request $request, Book $book) {

        $request->validate([
            'title' => 'required|min:5|max:35',
            'author' => 'required|min:7|max:60',
            'publisher_id' => 'required|min:10|max:30',
            // 'isbn' => 'required|min:10|max:40',   // isbn field is not requried at the update time
            'price' => 'required'
        ]);

        // Book::update($request->all());
        // Book::update($data);
        // Book::save($request->all());
        // Book::where('id', '=', $book['id'])->update($data);
        // Book::updateOrInsert($data);

        $book->update($request->all());

        return response()->json([
            'location' => '/books',
            'message' => 'book record updated'
        ]);

    }

    public function destroy(Book $book) {

    }
}
