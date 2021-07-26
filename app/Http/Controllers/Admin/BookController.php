<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('pages.admin.book.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('pages.admin.book.show', compact('book'));
    }

    public function create(Book $book)
    {
        $genres = Genre::get();
        return view('pages.admin.book.create', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    public function store(BookRequest $request, Book $book)
    {
        $attr = $request->all();

        if ($request->file('thumbnail')) {
            $thumbnails = request()->file('thumbnail')->store('image');
        } else {
            $thumbnails = null;
        }

        $attr['slug'] = \Str::slug(request('title'));
        $attr['thumbnail'] = $thumbnails;

        $book = Book::create($attr);
        $book->genres()->attach(request('genres'));
        return redirect()->route('book');
    }

    public function edit(Book $book)
    {
        $genre = Genre::get();
        return view('pages.admin.book.edit', [
            'book' => $book,
            'genres' => $genre,
        ]);
    }

    public function update(BookRequest $request, Book $book)
    {
        if (request()->file('thumbnail')) {
            \Storage::delete($book->thumbnail);
            $thumbnails = request()->file('thumbnail')->store('image');
        } else {
            $thumbnails = $book->thumbnail;
        }

        $attr = request()->all();
        $attr['slug'] = \Str::slug(request('title'));
        $attr['thumbnail'] = $thumbnails;
        // dd($attr);
        $book->update($attr);
        $book->genres()->sync(request('genres'));
        return redirect()->route('book');
    }

    public function destroy(Book $book)
    {
        \Storage::delete($book->thumbnail);
        $book->genres()->detach();
        $book->delete();
        return redirect()->route('book');
    }
}
