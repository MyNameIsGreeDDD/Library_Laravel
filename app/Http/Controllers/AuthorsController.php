<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $authors = Author::orderBy('firstname')->get();
        return view('authors/index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view('authors/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorStoreRequest $request
     * @return RedirectResponse
     */
    public function store(AuthorStoreRequest $request)
    {
        Author::create([
                'firstname' => $request->only('firstname')['firstname'],
                'lastname' => $request->only('lastname')['lastname'],
                'patronymic' => $request->only('patronymic')['patronymic']
            ]
        );
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Application|Factory|View
     */
    public function show(Author $author)
    {
        return \view('authors/show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Application|Factory|View
     */
    public function edit(Author $author)
    {
        return \view('authors/edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorUpdateRequest $request
     * @param Author $author
     * @return RedirectResponse
     */
    public function update(BookUpdateRequest $request, Author $author)
    {
        $author->update($request->only('firstname', 'lastname', 'patronymic'));
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return RedirectResponse
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
}
