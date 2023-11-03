<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\BookImage;
use Illuminate\Http\Request;

/**
 * Class BookImageController
 * @package App\Http\Controllers
 */
class BookImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookImages = BookImage::paginate();

        return view('book-image.index', compact('bookImages'))
            ->with('i', (request()->input('page', 1) - 1) * $bookImages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookImage = new BookImage();
        return view('book-image.create', compact('bookImage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookImage::$rules);

        $bookImage = BookImage::create($request->all());

        return redirect()->route('book-images.index')
            ->with('success', 'BookImage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookImage = BookImage::find($id);

        return view('book-image.show', compact('bookImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookImage = BookImage::find($id);

        return view('book-image.edit', compact('bookImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\admin\BookImage $bookImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookImage $bookImage)
    {
        request()->validate(BookImage::$rules);

        $bookImage->update($request->all());

        return redirect()->route('book-images.index')
            ->with('success', 'BookImage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookImage = BookImage::find($id)->delete();

        return redirect()->route('book-images.index')
            ->with('success', 'BookImage deleted successfully');
    }
}
