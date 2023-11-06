<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Genre;
use Illuminate\Http\Request;

/**
 * Class GenreController
 * @package App\Http\Controllers
 */
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::paginate();

        return view('admin.genre.index', compact('genres'))
            ->with('i', (request()->input('page', 1) - 1) * $genres->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = new Genre();
        return view('genre.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Genre::$rules);

        $genre = Genre::create($request->all());

        return redirect()->route('genres.index')
            ->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = Genre::find($id);

        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);

        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\admin\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        request()->validate(Genre::$rules);

        $genre->update($request->all());

        return redirect()->route('genres.index')
            ->with('success', 'Genre updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $genre = Genre::find($id)->delete();

        return redirect()->route('genres.index')
            ->with('success', 'Genre deleted successfully');
    }
}
