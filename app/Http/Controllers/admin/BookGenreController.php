<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\BookGenre;
use Illuminate\Http\Request;

/**
 * Class BookGenreController
 * @package App\Http\Controllers
 */
class BookGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookGenres = BookGenre::paginate();

        return view('book-genre.index', compact('bookGenres'))
            ->with('i', (request()->input('page', 1) - 1) * $bookGenres->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookGenre = new BookGenre();
        return view('book-genre.create', compact('bookGenre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookGenre::$rules);

        $bookGenre = BookGenre::create($request->all());

        return redirect()->route('book-genres.index')
            ->with('success', 'BookGenre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookGenre = BookGenre::find($id);

        return view('book-genre.show', compact('bookGenre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookGenre = BookGenre::find($id);

        return view('book-genre.edit', compact('bookGenre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookGenre $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookGenre $bookGenre)
    {
        request()->validate(BookGenre::$rules);

        $bookGenre->update($request->all());

        return redirect()->route('book-genres.index')
            ->with('success', 'BookGenre updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookGenre = BookGenre::find($id)->delete();

        return redirect()->route('book-genres.index')
            ->with('success', 'BookGenre deleted successfully');
    }
}
