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
    public function index(Request $request)
    {
        $booksets = Bookset::query();
        if ($request->has('search'))
        {
            $searchText = $request->input('search');
            $booksets->where('SetTitle', 'LIKE', "%$searchText%");
        }
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        if (empty($request->input('order')))
        {
            $orderBy = 'desc';
        }
        $booksets->orderBy('SetID', $orderBy);
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        $booksets = $booksets->paginate()->appends(['order' => $orderBy]);
        return view('admin.bookset.index', compact('booksets'))
            ->with('i', ($booksets->currentPage() - 1) * $booksets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookset = new Bookset();
        return view('admin.bookset.create', compact('bookset'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bookset::$rules);

        $input = $request->all();

        // Xử lý lưu tệp tải lên
        if ($request->hasFile('SetAvatar')) {
            $image = $request->file('SetAvatar');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images/bookset'), $imageName);
            $input['SetAvatar'] = '/images/bookset/' . $imageName;
        } else {
            if ($input['SetAvatarUrl']) {
                $input['SetAvatar'] = $input['SetAvatarUrl'];
            } else {
                $input['SetAvatar'] = '/images/bookset/default.jpg';
            }
        }

        $bookset = Bookset::create($input);

        return redirect()->route('bookset.index')
            ->with('success', 'Bookset created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookset = Bookset::find($id);
        $books = $bookset->books;

        return view('admin.bookset.show', compact('bookset', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookset = Bookset::find($id);

        return view('admin.bookset.edit', compact('bookset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Bookset $bookset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookset $bookset)
    {
        request()->validate(Bookset::$rules);

        $input = $request->all();

        // Xử lý lưu tệp tải lên
        if ($request->hasFile('SetAvatar')) {
            $image = $request->file('SetAvatar');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images/bookset'), $imageName);
            $input['SetAvatar'] = '/images/bookset/' . $imageName;
        } else {
            if ($input['SetAvatarUrl']) {
                $input['SetAvatar'] = $input['SetAvatarUrl'];
            } else {
                $input['SetAvatar'] = '/images/bookset/default.jpg';
            }
        }

        $bookset->update($input);

        return redirect()->route('bookset.index')
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

        return redirect()->route('bookset.index')
            ->with('success', 'Bookset deleted successfully');
    }

    function getAll(){
        return response()->json(Bookset::all());
    }
}
