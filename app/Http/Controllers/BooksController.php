<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class BooksController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $books = Book::orderBy('title')->get();
        $authors = Author::get();
        return view('books/index', compact(['books', 'authors']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $authors = Author::get();
        return view('books/create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BookStoreRequest $request): RedirectResponse
    {
        $book = Book::create([
            'title' => $request->only('title')['title'],
            'publication_year' => $request->only('publication_year')['publication_year']
        ]);
        foreach ($request->authorsId as $authorId) {
            $author = Author::find($authorId);
            $book->authors()->save($author);
        }
        return redirect()->route('books.index');

    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return Application|Factory|View
     */
    public function show(Book $book)
    {
        return view('books/show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return Application|Factory|View
     */
    public function edit(Book $book)
    {
        $authors = Author::get();
        return view('books/edit', compact(['book', 'authors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookUpdateRequest $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(BookUpdateRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->only('title', 'publication_year'));
        $book->authors()->detach();

        foreach ($request->authorsId as $authorId) {
            $author = Author::find($authorId);
            $book->authors()->save($author);
        }
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function filterByAttribute(Request $request)
    {
        $attribute = array_key_first($request->all());

        if ($attribute === 'authorId') {
            $author = Author::find($request->only($attribute)[$attribute]);

            $books = $author->books()->get();
            $authors = Author::get();

            return view('books/index', compact(['books', 'authors']));
        }
        if ($attribute === 'publication_year') {
            $books = Book::select()->where($attribute, '=', $request->only($attribute)[$attribute])->get();
            $authors = Author::get();

            return view('books/index', compact(['books', 'authors']));
        }


        return redirect()->route('books.index');
    }
}
