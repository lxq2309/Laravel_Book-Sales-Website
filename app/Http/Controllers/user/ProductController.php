<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    public function ProductDetail(Request $request, $id)
    {
        $books = DB::table("Book")->where("BookID", $id)->get();
        $reviews = DB::table('Review')->join('User', 'User.UserID', '=', 'Review.UserID')->where("BookID", $id)->select('Review.*', 'User.FirstName', 'User.LastName')->get();
        $totalRv = DB::table('Review')->where("BookID", $id)->count();
        $author = DB::table('Book')->where('BookID', $id)->pluck('Author')->first();
        $sameAuthor = DB::table('Book')->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')->where('Author', $author)->where('Book.BookID', '!=', $id)->inRandomOrder()->get();

        $products = \App\Models\admin\Book::find($id);
        //lay danh sach anh con
        $images = $products->bookimages;

        DB::update('UPDATE Book SET ViewCount = ViewCount + 1 WHERE BookID = ?', [$id]);
        $bookAlter = \App\Models\admin\Book::find($id);
        $listGenre = DB::table('BookGenre')
            ->join('Genre', 'BookGenre.GenreID', '=', 'Genre.GenreID')
            ->where('BookGenre.BookID', $id)
            ->select('Genre.*')
            ->get();
        $avgRating = DB::table('Review')->where('BookID', $id)->avg('Rating');
        if ($avgRating == null)
        {
            $avgRating = 0;
        }
        $rounderIntRating = intval(round($avgRating));
        $checkSale = DB::table('User')
            ->join('SalesOrder', 'User.UserID', "=", 'SalesOrder.UserID')
            ->join('SalesOrderDetail', 'SalesOrder.OrderID', '=', 'SalesOrderDetail.OrderID')
            ->where('User.UserID', Auth::id())->where('SalesOrderDetail.BookID', $id)->where("SalesOrder.OrderStatus", "COMPLETED")->count();

        $isPurchased = $checkSale > 0;
        $isLogin = Auth::id() != null;

        return view("user.product-detail", compact("books", 'reviews', 'totalRv', 'sameAuthor', 'bookAlter', 'listGenre', 'isPurchased', 'isLogin', 'rounderIntRating', 'images'));
    }

    public function getAllProduct($condition)
    {
        $perPage = 12;
        $products = null;
        switch ($condition) {
            case 'newest':
                $products = DB::table("Book")
                    ->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')
                    ->orderBy("Book.BookID", "desc")
                    ->paginate($perPage);
                break;
            case 'most-viewed':
                $products = DB::table("Book")
                    ->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')
                    ->orderBy("Book.ViewCount", "desc")
                    ->paginate($perPage);
                break;
            case 'best-selling':
                $products = DB::table("Book")
                    ->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')
                    ->join('getListBookSoldDesc', 'getListBookSoldDesc.BookID', '=', 'Book.BookID')
                    ->orderBy('getListBookSoldDesc.TotalSold', "desc")
                    ->paginate($perPage);
                break;
        }

        return response()->json(['products' => $products]);
    }


    public function getProductByID($productID)
    {
        $products = DB::table("Book")
            ->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')->where('Book.BookID', $productID)->first();

        return response()->json(["products" => $products]);
    }

    public function productsByCategory(Request $request, $genreID)
    {
        $products = DB::table("Book")
            ->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')
            ->join("BookGenre", "Book.BookID", "=", "BookGenre.BookID")
            ->join("Genre", "BookGenre.GenreID", "=", "Genre.GenreID")
            ->where("BookGenre.GenreID", $genreID)
            ->orderBy("BookGenre.GenreID", "asc")
            ->take(9)->paginate(9);

        return view('user.product-category', compact('products'));
    }

//    public function getProductsByCategory(Request $request, $genreID)
//    {
//        $products = DB::table("Book")
//            ->join("BookGenre", "Book.BookID", "=", "BookGenre.BookID")
//            ->join("Genre", "BookGenre.GenreID", "=", "Genre.GenreID")
//            ->where("BookGenre.GenreID", $genreID)
//            ->orderBy("BookGenre.GenreID", "asc")
//            ->take(10)->get();
//
//        return response()->json(['products' => $products]);
//    }

    //Tim kiem cho thanh input search
    public function searchProduct(Request $request)
    {
        $textSearch = $request->input('keyWord');


        $products = DB::table("Book")
            ->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')
            ->join('Publisher', "Book.PublisherID", "=", "Publisher.PublisherID")
            ->where('BookTitle', 'like', '%' . $textSearch . '%')
            ->orWhere('Author', 'like', '%' . $textSearch . '%')
            ->orWhere('PublisherName', 'like', '%' . $textSearch . '%')
            ->orderBy('Book.BookTitle', 'asc')
            ->take(10)->get();
//        $products = DB::table("Book")
//            ->where('BookTitle', 'like', '%' . $textSearch . '%')
//            ->orWhere('Author', 'like', '%' . $textSearch . '%')
//            ->orWhere('Author', 'like', '%' . $textSearch . '%')
//            ->take(10)->get();


        if ($textSearch) {
            return view('user.product-category', compact('products', 'textSearch'));
        } else {
            return view('user.product-category', compact('products'));
        }

    }

    //Tim kiem theo bo loc
    public function searchByFilter(Request $request)
    {
        // Nhận dữ liệu từ yêu cầu POST
        $dataRequest = $request->json()->all();

        //chuyển dữ liệu từ json sang mảng
        $data = json_decode(json_encode($dataRequest));

        $textSearch = $data->textSearch;

        //số sản phẩm mỗi trang
        $perPage = $data->perPage;

        //lay so trang hien tai
        $page = $data->page;

        // Khởi tạo mảng điều kiện truy vấn
        $conditions = [];

        foreach ($data->checkboxes as $checkbox) {
            $id = $checkbox->id;
            $name = $checkbox->name;

            if (strpos($name, 'group-1') !== false) {
                // Xử lý checkbox thuộc group giá cả
                if ($id === 'price-1') {
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '<=', 'value' => 25];
                } elseif ($id === 'price-2') {
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '>', 'value' => 25];
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '<=', 'value' => 50];
                } elseif ($id === 'price-3') {
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '>', 'value' => 50];
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '<=', 'value' => 75];
                } elseif ($id === 'price-4') {
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '>', 'value' => 75];
                }
            } elseif (strpos($name, 'group-2') !== false) {
                // Xử lý checkbox thuộc group tác giả
                $conditions[] = ['column' => 'Author', 'operator' => '=', 'value' => $id];
            } elseif (strpos($name, 'group-3') !== false) {
                // Xử lý checkbox thuộc group nhà xuất bản
                $conditions[] = ['column' => 'Book.PublisherID', 'operator' => '=', 'value' => $id];
            }
        }

        if (!empty($data->textSearch)) {
            $query = DB::table("Book")
                ->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')
                ->join('Publisher', "Book.PublisherID", "=", "Publisher.PublisherID");

            if (!empty($conditions) && $data->sort === 'p-name') {
                $query->join('getListBookSoldDesc', 'getListBookSoldDesc.BookID', '=', 'Book.BookID');
                foreach ($conditions as $condition) {
                    $query->where($condition['column'], $condition['operator'], $condition['value']);
                }
                $query->where('BookTitle', 'like', '%' . $textSearch . '%')
                    ->orWhere('Author', 'like', '%' . $textSearch . '%')
                    ->orWhere('PublisherName', 'like', '%' . $textSearch . '%');
                $query->select('Book.*', 'getListBookSoldDesc.TotalSold', 'Publisher.*')
                    ->orderByDesc('getListBookSoldDesc.TotalSold');
            } elseif (!empty($conditions) && $data->sort === 'p-price') {
                foreach ($conditions as $condition) {
                    $query->where($condition['column'], $condition['operator'], $condition['value']);
                }
                $query->where('BookTitle', 'like', '%' . $textSearch . '%')
                    ->orWhere('Author', 'like', '%' . $textSearch . '%')
                    ->orWhere('PublisherName', 'like', '%' . $textSearch . '%');
                $query->orderBy('Book.SellingPrice', 'asc');
            } elseif (!empty($conditions) && $data->sort === 'position') {
                foreach ($conditions as $condition) {
                    $query->where($condition['column'], $condition['operator'], $condition['value']);
                }
                $query->where('BookTitle', 'like', '%' . $textSearch . '%')
                    ->orWhere('Author', 'like', '%' . $textSearch . '%')
                    ->orWhere('PublisherName', 'like', '%' . $textSearch . '%');
            } elseif (empty($conditions) && $data->sort === 'p-name') {
                $query->join('getListBookSoldDesc', 'getListBookSoldDesc.BookID', '=', 'Book.BookID');
                $query->where('BookTitle', 'like', '%' . $textSearch . '%')
                    ->orWhere('Author', 'like', '%' . $textSearch . '%')
                    ->orWhere('PublisherName', 'like', '%' . $textSearch . '%');
                $query->select('Book.*', 'getListBookSoldDesc.TotalSold')
                    ->orderByDesc('getListBookSoldDesc.TotalSold');
            } elseif (empty($conditions) && $data->sort === 'p-price') {
                $query->where('BookTitle', 'like', '%' . $textSearch . '%')
                    ->orWhere('Author', 'like', '%' . $textSearch . '%')
                    ->orWhere('PublisherName', 'like', '%' . $textSearch . '%');
                $query->orderBy('Book.SellingPrice', 'asc');
            }
        } else {
            // Khởi tạo truy vấn
            $query = DB::table('Book')->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID');
            if (!empty($conditions) && $data->sort === 'p-name') {
                $query->join('getListBookSoldDesc', 'getListBookSoldDesc.BookID', '=', 'Book.BookID');
                $query->join('Publisher', 'Book.PublisherID', '=', 'Publisher.PublisherID');
                foreach ($conditions as $condition) {
                    $query->where($condition['column'], $condition['operator'], $condition['value']);
                }
                $query->select('Book.*', 'getListBookSoldDesc.TotalSold', 'Publisher.*')
                    ->orderByDesc('getListBookSoldDesc.TotalSold');
            } elseif (!empty($conditions) && $data->sort === 'p-price') {
                $query->join('Publisher', 'Book.PublisherID', '=', 'Publisher.PublisherID');
                foreach ($conditions as $condition) {
                    $query->where($condition['column'], $condition['operator'], $condition['value']);
                }
                $query->orderBy('Book.SellingPrice', 'asc');
            } elseif (!empty($conditions) && $data->sort === 'position') {
                $query->join('Publisher', 'Book.PublisherID', '=', 'Publisher.PublisherID');
                foreach ($conditions as $condition) {
                    $query->where($condition['column'], $condition['operator'], $condition['value']);
                }
            } elseif (empty($conditions) && $data->sort === 'p-name') {
                $query->join('getListBookSoldDesc', 'getListBookSoldDesc.BookID', '=', 'Book.BookID');
                $query->select('Book.*', 'getListBookSoldDesc.TotalSold')
                    ->orderByDesc('getListBookSoldDesc.TotalSold');
            } elseif (empty($conditions) && $data->sort === 'p-price') {
                $query->orderBy('Book.SellingPrice', 'asc');
            }
        }


        $skip = ($page - 1) * $perPage; // Tính vị trí bắt đầu của kết quả truy vấn


        $results = $query->skip($skip)->take($perPage)->paginate($perPage);

        // Lấy tổng số trang
        $totalPages = $results->lastPage();

        // Lấy tổng số mục
        $totalItems = $results->total();

        return response()->json(['results' => $results, 'totalPages' => $totalPages, 'totalItems' => $totalItems, 'skip' => $skip]);
    }

    public function reviewProduct(Request $request)
    {


        $dataForm = $request->json()->all();

        $data = json_decode(json_encode($dataForm));

//        return response()->json($data->data->rating);
        // Kiểm tra nếu userID là null
        if (is_null($data->data->userID)) {
            // Trả về message yêu cầu đăng nhập
            return response()->json([
                'message' => 'Vui lòng đăng nhập để thực hiện hành động này.'
            ]);
        } else {
            $newReviewId = DB::table('Review')->insertGetId([
                'BookID' => $data->data->bookID,
                'UserID' => $data->data->userID,
                'Content' => $data->data->review,
                'Rating' => $data->data->rating
            ]);

            $totalRv = DB::table('Review')->where("BookID", $data->data->bookID)->count();
            // Truy vấn đánh giá vừa thêm từ cơ sở dữ liệu
            $newReview = DB::table('Review')->join('User', 'User.UserID', '=', 'Review.UserID')->where('ReviewID', $newReviewId)->select('Review.*', 'User.FirstName', 'User.LastName')->first();
            return response()->json(['review' => $newReview, 'totalRv' => $totalRv]);
        }
    }

    public function deleteReview(Request $request, $reviewID)
    {
        $userID = $request->userID;
        // Kiểm tra xem bình luận có tồn tại không
        $review = Review::where('ReviewID', $reviewID)->where('UserID', $userID)->first();

        if (!$review) {
            return response()->json(['message' => 'Không thể xóa review của người khác', 'status' => 404], 404);
        }

        $review->delete();

        return response()->json(['message' => 'Đã xóa', 'status' => 200]);
    }

}
