@extends('user.layout.layout')

@section('content')

    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="/user/assets/img/banner/parallax.jpg"
            style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
        </ol>
    </nav>
    <div class="product-deatils-section float-left w-100">
        <div class="container">
            @foreach ($books as $id => $book)
                <div class="row" id="book" data-book-id="{{$book->BookID}}">
                    <div class="left-columm col-lg-5 col-md-5">
                        <div class="product-large-image tab-content">
                            <div class="tab-pane active" id="product-01" role="tabpanel"
                                 aria-labelledby="product-tab-01">
                                <div class="single-img img-full">
                                    <a href="{{$book->Avatar}}">
                                        <img src="{{$book->Avatar}}" class="img-fluid zoomImg" alt="">
                                    </a>
                                </div>
                            </div>
                            @php
                                $i = 2;
                            @endphp
                            @foreach($images as $image)
                                <div class="tab-pane" id="product-0{{ $i }}" role="tabpanel"
                                     aria-labelledby="product-tab-0{{ $i++ }}">
                                    <div class="single-img img-full">
                                        <a href="{{$image->ImagePath}}"><img
                                                src="{{$image->ImagePath}}"
                                                class="img-fluid" alt=""></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($images->count() > 0)
                            <div class="default small-image-list float-left w-100">
                                <div class="nav-add small-image-slider-single-product-tabstyle-3 owl-carousel"
                                     role="tablist">
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-01" href="#product-01"
                                           class="img active"><img
                                                src="{{$book->Avatar}}" class="img-fluid" alt=""></a>
                                    </div>
                                    @php
                                        $i = 2;
                                    @endphp
                                    @foreach($images as $image)
                                        <div class="single-small-image img-full">
                                            <a data-toggle="tab" id="product-tab-0{{$i}}" href="#product-0{{ $i++ }}"
                                               class="img"><img
                                                    src="{{$image->ImagePath}}" class="img-fluid" alt=""></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="right-columm col-lg-7 col-md-7">
                        <div class="product-information">
                            <h4 class="product-title text-capitalize float-left w-100"><a href="#"
                                                                                          class="float-left w-100">{{ $book->BookTitle }}</a>
                            </h4>
                            <div class="rating">
                                <div class="product-ratings d-inline-block align-middle">
                                    @php
                                        $starRatingHTML = '';

                                        $star = $rounderIntRating >= 5 ? 5 : $rounderIntRating;

                                    for($i = 0; $i < $star; $i++){
                                        $starRatingHTML .= "<span class='fa fa-stac'><i class='material-icons'>star</i></span>";
                                    }
                                    for( $i = $star; $i < 5; $i++){
                                        $starRatingHTML .= "<span class='fa fa-stac'><i class='material-icons off'>star</i></span>";
                                    }

                                    echo $starRatingHTML;
                                    @endphp
                                </div>
                                <a href="#" class="review-down">(đánh giá)</a>

                            </div>
                            <div class="price float-left w-100 d-flex">
                                <div class="regular-price">{{ $book->SellingPrice }}</div>
                                <div class="old-price">{{ $book->CostPrice }}</div>
                            </div>
                            <div class="product-variants float-left w-100">
                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Kích thước: {{ $book->Size }}</h5>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Tác giả: {{ $book->Author }}</h5>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Nhà xuất bản: {{ $bookAlter->publisher?->PublisherName }}</h5>
                                </div>
                                <div class="col-md-12 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Thuộc bộ: {{ $bookAlter->bookset?->SetTitle }}</h5>
                                </div>
                                <div class="col-md-12 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5 style="white-space: nowrap">Thể loại: </h5>
                                    <div>
                                        @foreach($listGenre as $genre)
                                            <a href="#{{ $genre->GenreID }}">{{ $genre->GenreName }}</a>,
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Số trang: {{ $book->PageCount }}</h5>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Trọng lượng: {{ $book->Weight }}</h5>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Năm xuất bản: {{ $book->YearPublished }}</h5>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Lượt xem: {{ $book->ViewCount }}</h5>
                                </div>
                                <div class="color-option d-flex align-items-center">
                                    <h5>Loại bìa :</h5>
                                    @if($book->CoverStyle == 1)
                                        Bìa cứng
                                    @else
                                        Bìa mềm
                                    @endif
                                </div>
                            </div>
                            <div class="btn-cart d-flex align-items-center float-left w-100">
                                <h5>qty:</h5>
                                <input id="book_quantity" value="1" type="number" min="0">
                                <button type="button" class="btn btn-primary btn-cart m-0" data-target="#cart-pop"
                                        data-toggle="modal" data-bookID="{{ $book->BookID }}" id="addToCart"><i
                                        class="material-icons">shopping_cart</i>
                                    Thêm Vào Giỏ Hàng
                                </button>
                            </div>
                            <div class="social-sharing float-left w-100">
                                <ul class="d-flex">
                                    <li class="facebook">
                                        <a href="#" target="_blank" class="facebook_link">
                                            <svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
                                                <path fill="#666"
                                                      d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>

                                    <li class="twitter">
                                        <a href="#" target="_blank" class="twitter_link">
                                            <svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
                                                <path fill="#666"
                                                      d="M18.258,3.266c-0.693,0.405-1.46,0.698-2.277,0.857c-0.653-0.686-1.586-1.115-2.618-1.115c-1.98,0-3.586,1.581-3.586,3.53c0,0.276,0.031,0.545,0.092,0.805C6.888,7.195,4.245,5.79,2.476,3.654C2.167,4.176,1.99,4.781,1.99,5.429c0,1.224,0.633,2.305,1.596,2.938C2.999,8.349,2.445,8.19,1.961,7.925C1.96,7.94,1.96,7.954,1.96,7.97c0,1.71,1.237,3.138,2.877,3.462c-0.301,0.08-0.617,0.123-0.945,0.123c-0.23,0-0.456-0.021-0.674-0.062c0.456,1.402,1.781,2.422,3.35,2.451c-1.228,0.947-2.773,1.512-4.454,1.512c-0.291,0-0.575-0.016-0.855-0.049c1.588,1,3.473,1.586,5.498,1.586c6.598,0,10.205-5.379,10.205-10.045c0-0.153-0.003-0.305-0.01-0.456c0.7-0.499,1.308-1.12,1.789-1.827c-0.644,0.28-1.334,0.469-2.06,0.555C17.422,4.782,17.99,4.091,18.258,3.266">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>

                                    <li class="google">
                                        <a href="#" target="_blank" class="google_link">
                                            <svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
                                                <path fill="#666"
                                                      d="M8.937,10.603c-0.383-0.284-0.741-0.706-0.754-0.837c0-0.223,0-0.326,0.526-0.758c0.684-0.56,1.062-1.297,1.062-2.076c0-0.672-0.188-1.273-0.512-1.71h0.286l1.58-1.196h-4.28c-1.717,0-3.222,1.348-3.222,2.885c0,1.587,1.162,2.794,2.726,2.858c-0.024,0.113-0.037,0.225-0.037,0.334c0,0.229,0.052,0.448,0.157,0.659c-1.938,0.013-3.569,1.309-3.569,2.84c0,1.375,1.571,2.373,3.735,2.373c2.338,0,3.599-1.463,3.599-2.84C10.233,11.99,9.882,11.303,8.937,10.603 M5.443,6.864C5.371,6.291,5.491,5.761,5.766,5.444c0.167-0.192,0.383-0.293,0.623-0.293l0,0h0.028c0.717,0.022,1.405,0.871,1.532,1.89c0.073,0.583-0.052,1.127-0.333,1.451c-0.167,0.192-0.378,0.293-0.64,0.292h0C6.273,8.765,5.571,7.883,5.443,6.864 M6.628,14.786c-1.066,0-1.902-0.687-1.902-1.562c0-0.803,0.978-1.508,2.093-1.508l0,0l0,0h0.029c0.241,0.003,0.474,0.04,0.695,0.109l0.221,0.158c0.567,0.405,0.866,0.634,0.956,1.003c0.022,0.097,0.033,0.194,0.033,0.291C8.752,14.278,8.038,14.786,6.628,14.786 M14.85,4.765h-1.493v2.242h-2.249v1.495h2.249v2.233h1.493V8.502h2.252V7.007H14.85V4.765z">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>

                                    <li class="pinterest">
                                        <a href="#" target="_blank" class="pinterest_link">
                                            <svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
                                                <path fill="#666"
                                                      d="M9.797,2.214C9.466,2.256,9.134,2.297,8.802,2.338C8.178,2.493,7.498,2.64,6.993,2.935C5.646,3.723,4.712,4.643,4.087,6.139C3.985,6.381,3.982,6.615,3.909,6.884c-0.48,1.744,0.37,3.548,1.402,4.173c0.198,0.119,0.649,0.332,0.815,0.049c0.092-0.156,0.071-0.364,0.128-0.546c0.037-0.12,0.154-0.347,0.127-0.496c-0.046-0.255-0.319-0.416-0.434-0.62C5.715,9.027,5.703,8.658,5.59,8.101c0.009-0.075,0.017-0.149,0.026-0.224C5.65,7.254,5.755,6.805,5.948,6.362c0.564-1.301,1.47-2.025,2.931-2.458c0.327-0.097,1.25-0.252,1.734-0.149c0.289,0.05,0.577,0.099,0.866,0.149c1.048,0.33,1.811,0.938,2.218,1.888c0.256,0.591,0.33,1.725,0.154,2.483c-0.085,0.36-0.072,0.667-0.179,0.993c-0.397,1.206-0.979,2.323-2.295,2.633c-0.868,0.205-1.519-0.324-1.733-0.869c-0.06-0.151-0.161-0.418-0.101-0.671c0.229-0.978,0.56-1.854,0.815-2.831c0.243-0.931-0.218-1.665-0.943-1.837C8.513,5.478,7.816,6.312,7.579,6.858C7.39,7.292,7.276,8.093,7.426,8.672c0.047,0.183,0.269,0.674,0.23,0.844c-0.174,0.755-0.372,1.568-0.587,2.31c-0.223,0.771-0.344,1.562-0.56,2.311c-0.1,0.342-0.096,0.709-0.179,1.066v0.521c-0.075,0.33-0.019,0.916,0.051,1.242c0.045,0.209-0.027,0.467,0.076,0.621c0.002,0.111,0.017,0.135,0.052,0.199c0.319-0.01,0.758-0.848,0.917-1.094c0.304-0.467,0.584-0.967,0.816-1.514c0.208-0.494,0.241-1.039,0.408-1.566c0.12-0.379,0.292-0.824,0.331-1.24h0.025c0.066,0.229,0.306,0.395,0.485,0.52c0.56,0.4,1.525,0.77,2.573,0.523c1.188-0.281,2.133-0.838,2.755-1.664c0.457-0.609,0.804-1.313,1.07-2.112c0.131-0.392,0.158-0.826,0.256-1.241c0.241-1.043-0.082-2.298-0.384-2.981C14.847,3.35,12.902,2.17,9.797,2.214">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="product-tab-area float-left w-100">
        <div class="container">
            <div class="tabs">
                <ul class="nav nav-tabs justify-content-start">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product-tab1"
                                            id="tab1">
                            <div class="tab-title">Mô tả</div>
                        </a></li>
                    <li class="nav-item"><a class="nav-link totalRV" data-toggle="tab" href="#product-tab2" id="tab2">
                            <div class="tab-title">Đánh giá (<span id="totalReviewCount">{{$totalRv}}</span>)</div>
                        </a></li>
                </ul>
            </div>
            <div class="tab-content float-left w-100">
                <div class="tab-pane active" id="product-tab1" role="tabpanel" aria-labelledby="tab1">
                    <div class="description">
                        {{ $book->Description }}
                    </div>
                </div>
                <div class="tab-pane" id="product-tab2" role="tabpanel" aria-labelledby="tab2">
                    <div class="reviews-tab  float-left w-100" id="reviews-container">
                        @if($reviews)
                            @foreach($reviews as $review)
                                <div class="ttreview-tab float-left w-100 p-30">
                                    <h2>{{ "$review->FirstName $review->LastName" }}</h2>
                                    <div class="rating float-left w-100">
                                        <div class="product-ratings d-inline-block align-middle">
                                            @php
                                                $starRatingHTML = '';

                                                $star = $review->Rating >=5 ? 5 : $review->Rating;
                                            for($i = 0; $i < $star; $i++){
                                                $starRatingHTML .= "<span class='fa fa-stac'><i class='material-icons'>star</i></span>";
                                            }
                                            for( $i = $star; $i < 5; $i++){
                                                $starRatingHTML .= "<span class='fa fa-stac'><i class='material-icons off'>star</i></span>";
                                            }

                                            echo $starRatingHTML;
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="review-title float-left w-100"><span
                                            class="date"> {{$review->CreatedDate}}</span></div>
                                    <div class="review-desc  float-left w-100">{{$review->Content}} </div>
                                    @if($review->UserID == Auth::id())
                                        <div class="delete-button float-right">
                                            <button type="button" class="btn btn-danger delete-comment"
                                                    data-review-id="{{ $review->ReviewID }}">Xóa
                                            </button>
                                        </div>
                                    @endif
                                    <div class="message-error"></div>
                                </div>

                            @endforeach
                        @endif


                        @if($isPurchased)
                            <form action="#" id="reviewForm" class="rating-form float-left w-100">
                                @csrf
                                <h5>Để lại đánh giá</h5>
                                <div class="rating">
                                    <div class='rating-stars text-left'>
                                        <ul id='stars'>
                                            <li class='star' title='Poor' data-value='1'>
                                                <i class="material-icons">star</i>
                                            </li>
                                            <li class='star' title='Fair' data-value='2'>
                                                <i class="material-icons">star</i>
                                            </li>
                                            <li class='star' title='Good' data-value='3'>
                                                <i class="material-icons">star</i>
                                            </li>
                                            <li class='star' title='Excellent' data-value='4'>
                                                <i class="material-icons">star</i>
                                            </li>
                                            <li class='star' title='WOW!!!' data-value='5'>
                                                <i class="material-icons">star</i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class='success-box'>
                                        <div class='clearfix'></div>
                                        <div class='text-message text-success'></div>
                                        <div class='clearfix'></div>
                                    </div>
                                </div>
                                <div class="row d-block">
                                    <input type="hidden" name="userId"
                                           value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                                    <div class="col-sm-12 float-left form-group">
                                        <label for="r-textarea">Lời nhắn</label>
                                        <textarea name="review" id="r-textarea" cols="30" rows="10"
                                                  class="w-100"></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary submit" value="Gửi">
                            </form>
                        @else
                            <div>
                                @if($isLogin == false)
                                    Đăng nhập đi mới được bình luận
                                @else
                                    Mua hàng đi thì mới được bình luận
                                @endif
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="product-accessories" class="product-accessories my-40 w-100 float-left">
        <div class="container">
            <div class="row">
                <div class="tt-title d-inline-block float-none w-100 text-center">Sách cùng tác giả</div>
                @if($sameAuthor->count() > 0)
                    <div class="product-accessories-content products grid owl-carousel">
                        @foreach($sameAuthor as $bookAu)
                            <div class="product-layouts">
                                <div class="product-thumb">
                                    <div class="image zoom">
                                        <a href="{{ route('product-detail', $bookAu->BookID) }}">
                                            <img src="{{$bookAu->Avatar}}" alt="01"/>
                                            <img src="{{$bookAu->Avatar}}" alt="02"
                                                 class="second_image img-responsive"/> </a>
                                    </div>
                                    <div class="thumb-description">
                                        <div class="caption">
                                            <h4 class="product-title text-capitalize"><a
                                                    href="{{ route('product-detail', $bookAu->BookID) }}">{{$bookAu->BookTitle}}</a>
                                            </h4>
                                        </div>
                                        <div class="rating">
                                            <div class="product-ratings d-inline-block align-middle">
                                                @php
                                                    $starRatingHTML = '';

                                                    $star = $bookAu->AVGRating >= 5 ? 5 : $bookAu->AVGRating;
                                                for($i = 0; $i < $star; $i++){
                                                    $starRatingHTML .= "<span class='fa fa-stac'><i class='material-icons'>star</i></span>";
                                                }
                                                for( $i = $star; $i < 5; $i++){
                                                    $starRatingHTML .= "<span class='fa fa-stac'><i class='material-icons off'>star</i></span>";
                                                }

                                                echo $starRatingHTML;
                                                @endphp
                                            </div>
                                        </div>
                                        <div class="price">
                                            <div class="regular-price">{{$bookAu->SellingPrice}}</div>
                                            <div class="old-price">{{$bookAu->CostPrice}}</div>
                                        </div>
                                        <div class="button-wrapper">
                                            <div class="button-group text-center">
                                                <button type="button" class="btn btn-primary btn-cart"
                                                        data-target="#cart-pop" data-toggle="modal"><i
                                                        class="material-icons">shopping_cart</i><span>Add to
                                                    cart</span></button>
                                                <a href="wishlist.html" class="btn btn-primary btn-wishlist"><i
                                                        class="material-icons">favorite</i><span>wishlist</span></a>
                                                <button type="button" class="btn btn-primary btn-compare"><i
                                                        class="material-icons">equalizer</i><span>Compare</span>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-quickview"
                                                        data-toggle="modal" data-target="#product_view"><i
                                                        class="material-icons">visibility</i><span>Quick View</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="position-relative" style="left: 50%;transform: translateX(-50%);">Không có cuốn sách nào
                        khác của tác giả {{ $book->Author }}</div>
                @endif
            </div>
        </div>
    </div>

    <div id="toast"></div>

@endsection


@section('scripts')
    <script>
        $('document').ready(function () {
            events.setOnClickBtnQuickView();
            <?php
            $ok = $isLogin & $isPurchased;
            ?>
            if (<?php echo $ok; ?>) {
                addReview();
                deleteReview();
            }


            document.querySelector("#addToCart").addEventListener('click', function () {
                var bookID = this.dataset.bookid;
                var qty = document.querySelector('#book_quantity').value;
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '/cart/add',
                    data: {
                        book_id: bookID,
                        book_quantity: qty
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

        function addReview() {
            // Lấy tất cả các phần tử <li> có class 'star' trong danh sách có id là 'stars'
            var stars = document.querySelectorAll('#stars .star');
            var rating = null; // Đặt biến rating ở đây để có thể truy cập nó từ bên ngoài sự kiện click

            // Lặp qua từng phần tử và thêm sự kiện click
            stars.forEach(function (star) {
                star.addEventListener('click', function () {

                    // Thêm class 'selected' cho sao được chọn
                    this.classList.add('selected');

                    // Lấy giá trị 'data-value' của sao được chọn
                    rating = this.getAttribute('data-value');
                });
            });

            document.getElementById('reviewForm').addEventListener('submit', function (event) {
                event.preventDefault();

                var review = document.querySelector('#r-textarea').value;

                var bookID = $('#book').data('book-id');
                var userID = document.querySelector('#reviewForm input[name="userId"]').value;


                // Kiểm tra xem đã chọn sao chưa
                if (rating === null) {
                    alert('Vui lòng chọn sao trước khi gửi đánh giá.');
                    return;
                }

                data = {
                    rating: rating,
                    review: review,
                    bookID: bookID,
                    userID: userID,
                };

                // Gửi yêu cầu API bằng phương thức POST
                fetch('/api/review', {
                    method: 'POST',
                    body: JSON.stringify({data}),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {


                        const newReviewHTML = newReviewHTMLCode(data);

                        // Chọn phần tử chứa đánh giá và thêm đánh giá mới vào đó
                        const reviewsContainer = document.getElementById('reviewForm');
                        reviewsContainer.insertAdjacentHTML("beforebegin", newReviewHTML);

                        document.querySelector("#totalReviewCount").innerHTML = data.totalRv;

                        deleteReview();

                        // reset form
                        document.querySelector('#r-textarea').value = "";
                        document.querySelector(".success-box .text-message.text-success").innerHTML = "";
                        let liStars = document.querySelectorAll("#stars li");
                        liStars.forEach(function (item) {
                            item.className = "star";
                        });
                        rating = null;

                        // Hiển thị toast message
                        showToast({
                            title: "Thành công!",
                            message: "Thêm đánh giá thành công!",
                            type: "success",
                            duration: 5000
                        });
                    })
                    .catch(error => {
                        // Xử lý lỗi nếu có
                        console.error('Có lỗi khi gửi yêu cầu API:', error);
                    });
            });
        }

        function newReviewHTMLCode(data) {
            console.log(data);
            let starRatingHTML = '';
            for (let i = 0; i < data.review.Rating; i++) {
                starRatingHTML += `<span class="fa fa-stack"><i class="material-icons">star</i></span>`;
            }
            for (let i = data.review.Rating; i < 5; i++) {
                starRatingHTML += `<span class="fa fa-stack"><i class="material-icons off">star</i></span>`;
            }
            return `<div class="ttreview-tab float-left w-100 p-30">
                                <h2>${data.review.FirstName + ' ' + data.review.LastName}</h2>
                                <div class="rating float-left w-100">
                                    <div class="product-ratings d-inline-block align-middle">
                                        ${starRatingHTML}
                                    </div>
                                </div>
                                <div class="review-title float-left w-100">
                                    <span class="date"> ${data.review.CreatedDate}</span>
                                </div>
                                <div class="review-desc  float-left w-100">${data.review.Content}</div>
                                   <div class="delete-button float-right">
                                    <button type="button" class="btn btn-danger delete-comment" data-review-id="${data.review.ReviewID}">Xóa</button>
                                </div>
                            </div>`;
        }

        function deleteReview() {
            var deleteButtons = document.querySelectorAll('.delete-comment');
            var userID = document.querySelector('#reviewForm input[name="userId"]').value;
            console.log(userID);
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    if (confirm("Bạn có chắc là muốn xoá đánh giá này không ?")) {
                        var reviewID = this.getAttribute('data-review-id'); // Using plain JavaScript to get data attribute

                        fetch('/api/delete-review/' + reviewID, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({userID: userID})


                        })
                            .then(response => response.json())
                            .then(function (response) {
                                if (response.status === 200) {

                                    var reviewContainer = button.closest('.ttreview-tab');
                                    reviewContainer.remove();
                                    // Hiển thị toast message
                                    showToast({
                                        title: "Thành công!",
                                        message: "Xoá đánh giá thành công!",
                                        type: "success",
                                        duration: 5000
                                    });
                                    let totalRVCount = document.querySelector("#totalReviewCount");
                                    totalRVCount.innerHTML = parseInt(totalRVCount.innerHTML) - 1;
                                } else if (response.status === 404) {

                                    alert(response.message);
                                } else {
                                    alert("Không thành công");
                                }
                            })
                            .then(data => {
                                // console.log(data);
                            })

                            .catch(function (error) {

                                console.error('Network error:', error);
                            });
                    }
                });
            });
        }

        // Toast function
        function showToast({title = "", message = "", type = "info", duration = 3000}) {
            const main = document.getElementById("toast");
            if (main) {
                const toast = document.createElement("div");

                // Auto remove toast
                const autoRemoveId = setTimeout(function () {
                    main.removeChild(toast);
                }, duration + 1000);

                // Remove toast when clicked
                toast.onclick = function (e) {
                    if (e.target.closest(".toast__close")) {
                        main.removeChild(toast);
                        clearTimeout(autoRemoveId);
                    }
                };

                const icons = {
                    success: "fas fa-check-circle",
                    info: "fas fa-info-circle",
                    warning: "fas fa-exclamation-circle",
                    error: "fas fa-exclamation-circle"
                };
                const icon = icons[type];
                const delay = (duration / 1000).toFixed(2);

                toast.classList.add("toast", `toast--${type}`);
                toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

                toast.innerHTML = `
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title">${title}</h3>
                        <p class="toast__msg">${message}</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                `;
                main.appendChild(toast);
            }
        }
    </script>
@endsection


@section('styleProductDetail')
    <style>

        /* ======= Toast message ======== */

        #toast {
            position: fixed;
            top: 32px;
            right: 32px;
            z-index: 999999;
        }

        .toast {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 2px;
            padding: 20px 0;
            min-width: 400px;
            max-width: 450px;
            border-left: 4px solid;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.08);
            transition: all linear 0.3s;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(calc(100% + 32px));
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
            }
        }

        .toast--success {
            border-color: #47d864;
        }

        .toast--success .toast__icon {
            color: #47d864;
        }

        .toast--info {
            border-color: #2f86eb;
        }

        .toast--info .toast__icon {
            color: #2f86eb;
        }

        .toast--warning {
            border-color: #ffc021;
        }

        .toast--warning .toast__icon {
            color: #ffc021;
        }

        .toast--error {
            border-color: #ff623d;
        }

        .toast--error .toast__icon {
            color: #ff623d;
        }

        .toast + .toast {
            margin-top: 24px;
        }

        .toast__icon {
            font-size: 24px;
        }

        .toast__icon,
        .toast__close {
            padding: 0 16px;
        }

        .toast__body {
            flex-grow: 1;
        }

        .toast__title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .toast__msg {
            font-size: 14px;
            color: #888;
            margin-top: 6px;
            line-height: 1.5;
        }

        .toast__close {
            font-size: 20px;
            color: rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

    </style>
@endsection
