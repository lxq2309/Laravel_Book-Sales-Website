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
    public function index(Request $request)
    {
        $genres = Genre::query();
        if ($request->has('search'))
        {
            $searchText = $request->input('search');
            $genres->where('GenreName', 'LIKE', "%$searchText%");
        }
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        if (empty($request->input('order')))
        {
            $orderBy = 'desc';
        }
        $genres->orderBy('GenreID', $orderBy);
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        $genres = $genres->paginate()->appends(['order' => $orderBy]);
        return view('admin.genre.index', compact('genres'))
            ->with('i', ($genres->currentPage() - 1) * $genres->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = new Genre();
        return view('admin.genre.create', compact('genre'));
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

        return redirect()->route('genre.index')
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

        return view('admin.genre.show', compact('genre'));
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

        return view('admin.genre.edit', compact('genre'));
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

        return redirect()->route('genre.index')
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

        return redirect()->route('genre.index')
            ->with('success', 'Genre deleted successfully');
    }

    function getAll(){
        return response()->json(Genre::all());
    }
}
