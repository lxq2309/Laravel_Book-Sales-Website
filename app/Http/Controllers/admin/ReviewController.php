<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Review;
use Illuminate\Http\Request;

/**
 * Class ReviewController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::paginate();

        return view('review.index', compact('reviews'))
            ->with('i', (request()->input('page', 1) - 1) * $reviews->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $review = new Review();
        return view('review.create', compact('review'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Review::$rules);

        $review = Review::create($request->all());

        return redirect()->route('reviews.index')
            ->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);

        return view('review.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);

        return view('review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        request()->validate(Review::$rules);

        $review->update($request->all());

        return redirect()->route('reviews.index')
            ->with('success', 'Review updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $review = Review::find($id)->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Review deleted successfully');
    }
}
