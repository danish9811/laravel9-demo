<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;
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
            'author' => 'required|min:7|max:35',
            'publisher_id' => 'required|min:6|max:12',
            'isbn' => 'required|min:13|max:15',
            'price' => 'required'
        ]);

        Book::create($request->all());

        return response()->json([
            'location' => '/books',
            'message' => 'record has been added successfully',
        ]);
    }

    // todo : this method is not called by any endpoint, yet we have written its definition for proper understanding
    public function show(Book $book): JsonResponse {
        return response()->json([
            'id' => $book['id'],
            'title' => $book['title'],
            'author' => $book['author'],
            'publisher_id' => $book['publisher_id'],
            'isbn' => $book['isbn'],
            'price' => $book['price']
        ]);
    }

    public function edit(Book $book) {
        return view('layout.modals', compact('book'));
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'title' => 'required|min:5|max:35',
            'author' => 'required|min:7|max:60',
            'publisher_id' => 'required|min:6|max:12',
            'price' => 'required'
        ]);

        $book->update($request->all());

        return response()->json([
            'location' => '/books',
            'message' => 'the record has been updated successfully'
        ]);
    }

    public function destroy(Book $book) {
        Book::destroy($book['id']);
        return response()->json([
            'location' => '/books',
            'message' => 'the record has been deleted successfully'
        ]);
    }



}
