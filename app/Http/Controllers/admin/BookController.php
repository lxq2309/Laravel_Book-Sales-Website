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
use const Grpc\STATUS_OK;

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
    public function index(Request $request)
    {
        $books = Book::query();
        if ($request->has('search'))
        {
            $searchText = $request->input('search');
            $books->where('BookTitle', 'LIKE', "%$searchText%");
        }
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        if (empty($request->input('order')))
        {
            $orderBy = 'desc';
        }
        $books->orderBy('BookID', $orderBy);
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        $books = $books->paginate()->appends(['order' => $orderBy]);
        return view('admin.book.index', compact('books'))
            ->with('i', ($books->currentPage() - 1) * $books->perPage());
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        $genres = Genre::all();
        $publishers = Publisher::all();
        $bookSets = BookSet::all();
        $selectedGenres = $book->bookgenre->pluck('GenreID')->toArray();
        $images = $book->bookimages;

        return view('admin.book.create', compact('book', 'publishers', 'genres', 'bookSets', 'selectedGenres', 'images'));
    }

    /**
     * Create the specified resource in storage.
     * (Ta truyền vào BookID, sau đó nhờ cơ chế Route Model Binding của Laravel mà nó tự binding sang bản ghi Book tương ứng)
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\admin\Book $book
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Book::$rules);

        // lấy dữ liệu từ các thẻ input
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
                $input['Avatar'] = '/images/book/default.png';
            }
        }

        // Thêm sách mới
        $book = Book::create($input);

        // Cập nhật thể loại
        $selectedGenres = $request->input('bookgenre', []);
        $book->genres()->sync($selectedGenres);


        // Thêm các hình ảnh mới vào
        $selectedImageIds = $request->input('ImagesIds', []);
        $newBookImages = [];
        $randomNumber = time();
        $newImagesUrl = $request->input('images-url', []);
        //  Thêm từ url
        if ($newImagesUrl) {
            foreach ($newImagesUrl as $imageUrl) {
                if (!empty($imageUrl)) {
                    $newBookImages[] = [
                        'ImagePath' => $imageUrl,
                        'Description' => "$book->BookTitle-$randomNumber"
                    ];
                }
            }
        }
        // Thêm từ file
        if ($request->hasFile('images-file')) {
            $newImagesFile = $request['images-file'];
            foreach ($newImagesFile as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images/book/images'), $imageName);
                $imagePath = '/images/book/images/' . $imageName;
                $newBookImages[] = [
                    'ImagePath' => $imagePath,
                    'Description' => "$book->BookTitle-$randomNumber"
                ];
            }
        }
        $book->bookimages()->createMany($newBookImages);

        return redirect()->route('book.show', $book->BookID)
            ->with('success', 'Sửa thông tin thành công!');
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
        $images = $book->bookimages;

        return view('admin.book.edit', compact('book', 'publishers', 'genres', 'bookSets', 'selectedGenres', 'images'));
    }

    /**
     * Update the specified resource in storage.
     * (Ta truyền vào BookID, sau đó nhờ cơ chế Route Model Binding của Laravel mà nó tự binding sang bản ghi Book tương ứng)
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\admin\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        request()->validate(Book::$rules);

        // lấy dữ liệu từ các thẻ input
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
                $input['Avatar'] = '/images/book/default.png';
            }
        }

        // cập nhật dữ liệu của sách
        $book->update($input);

        // Lấy danh sách thể loại đã chọn từ form
        $selectedGenres = $request->input('bookgenre', []);

        /**
         * Cập nhật danh sách thể loại cho cuốn sách này bằng hàm sync()
         * Hàm sync() sẽ thực hiện các bước sau:
         *
         * - Xoá các bản ghi của bảng BookGenre mà không tồn tại trong $selectedGenres
         * - Thêm các bản ghi trong $selectedGenres mà chưa tồn tại trong bảng BookGenre
         * - Giữ lại các bản ghi có trong cả $selectedGenres và bảng BookGenre.
         */
        $book->genres()->sync($selectedGenres);


        // Xoá các hình ảnh đã chọn
        $selectedImageIds = $request->input('ImagesIds', []);
        $imagesToDelete = $book->bookimages->whereNotIn('ImageID', $selectedImageIds);
        foreach ($imagesToDelete as $image) {
            $image->delete();
        }
        // Thêm các hình ảnh mới vào
        $newBookImages = [];
        $randomNumber = time();
        $newImagesUrl = $request->input('images-url', []);
        //  Thêm từ url
        if ($newImagesUrl) {
            foreach ($newImagesUrl as $imageUrl) {
                if (!empty($imageUrl)) {
                    $newBookImages[] = [
                        'ImagePath' => $imageUrl,
                        'Description' => "$book->BookTitle-$randomNumber"
                    ];
                }
            }
        }
        // Thêm từ file
        if ($request->hasFile('images-file')) {
            $newImagesFile = $request['images-file'];
            foreach ($newImagesFile as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images/book/images'), $imageName);
                $imagePath = '/images/book/images/' . $imageName;
                $newBookImages[] = [
                    'ImagePath' => $imagePath,
                    'Description' => "$book->BookTitle-$randomNumber"
                ];
            }
        }
        $book->bookimages()->createMany($newBookImages);

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

    /**
     * api search book
     */
    public function searchBook($searchText)
    {
        $books = Book::where('BookTitle', 'LIKE', "%$searchText%")
            ->get();
        return response()->json($books);
    }

    /**
     * api get book by id
     */
    public function getById($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * api get all
     */
    public function getAll()
    {
        $books = Book::all();
        return response()->json($books);
    }
}
