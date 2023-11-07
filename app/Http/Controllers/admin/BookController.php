<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Book;
use App\Models\admin\BookGenre;
use App\Models\admin\Bookset;
use App\Models\admin\Genre;
use App\Models\admin\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate();

        return view('admin.book.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * $books->perPage());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        $genres = DB::table('BookGenre')
            ->join('Genre', 'BookGenre.GenreID', '=', 'Genre.GenreID')
            ->where('BookGenre.BookID', $id)
            ->select('Genre.*')
            ->get();

        $images = $book->bookimages;

        return view('admin.book.show', compact('book', 'genres', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $genres = Genre::all();
        $publishers = Publisher::all();
        $bookSets = BookSet::all();
        $selectedGenres = $book->bookgenre->pluck('GenreID')->toArray();

        return view('admin.book.edit', compact('book', 'publishers', 'genres', 'bookSets', 'selectedGenres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\admin\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        request()->validate(Book::$rules);

        $input = $request->all();

        // Xử lý lưu tệp tải lên
        if ($request->hasFile('Avatar')) {
            $image = $request->file('Avatar');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images/book'), $imageName);
            $input['Avatar'] = '/images/book/' . $imageName;
        } else {
            if ($input['AvatarUrl']) {
                $input['Avatar'] = $input['AvatarUrl'];
            } else {
                $input['Avatar'] = '/images/book/default.jpg';
            }
        }

        $book->update($input);

        return redirect()->route('book.show', $book->BookID)
            ->with('success', 'Sửa thông tin thành công!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $title = $book->BookTitle;
        $book->delete();

        return redirect()->route('book.index')
            ->with('success', "Xoá thành công cuốn sách $title với mã sách là $id");
    }
}
