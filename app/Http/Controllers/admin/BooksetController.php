<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Bookset;
use Illuminate\Http\Request;

/**
 * Class BooksetController
 * @package App\Http\Controllers
 */
class BooksetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booksets = Bookset::paginate();

        return view('bookset.index', compact('booksets'))
            ->with('i', (request()->input('page', 1) - 1) * $booksets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookset = new Bookset();
        return view('bookset.create', compact('bookset'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bookset::$rules);

        $bookset = Bookset::create($request->all());

        return redirect()->route('booksets.index')
            ->with('success', 'Bookset created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookset = Bookset::find($id);

        return view('bookset.show', compact('bookset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookset = Bookset::find($id);

        return view('bookset.edit', compact('bookset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bookset $bookset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookset $bookset)
    {
        request()->validate(Bookset::$rules);

        $bookset->update($request->all());

        return redirect()->route('booksets.index')
            ->with('success', 'Bookset updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookset = Bookset::find($id)->delete();

        return redirect()->route('booksets.index')
            ->with('success', 'Bookset deleted successfully');
    }
}
