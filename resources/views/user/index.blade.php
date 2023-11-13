@extends('user.layout.layout')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <main>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="slider-wrapper my-40 my-sm-25 float-left w-100">
            <div class="container d-flex justify-content-between">
                <div class="banner-slider">
                    <div class="ttloading-bg"></div>
                    <div class="slider slider-for owl-carousel">
                        <div>
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-01.jpg" alt=""/>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-02.jpg" alt=""/>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-03.jpg" alt=""/>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-04.jpg" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="banner-sale">
                    <div class="slider">
                        <div class="col-md-12 d-flex align-items-start">
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-01.jpg" style="border-radius: 10px;"/>
                            </a>
                        </div>
                        <div class="col-md-12 align-items-end">
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-02.jpg" style="border-radius: 10px;"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-between" style="margin-top: 10px;">
                <div class="d-flex align-items-start">
                    <a href="#">
                        <img src="/user/assets/img/slider/Mini_Banner_1.png"/>
                    </a>
                </div>
                <div class="align-items-end">
                    <a href="#">
                        <img src="/user/assets/img/slider/Mini_Banner_2.png"/>
                    </a>
                </div>
                <div class="align-items-end">
                    <a href="#">
                        <img src="/user/assets/img/slider/Mini_Banner_3.png"/>
                    </a>
                </div>
                <div class="align-items-end">
                    <a href="#">
                        <img src="/user/assets/img/slider/Mini_Banner_4.png"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div id="main">
                <div id="ttspecial" class="ttspecial my-40 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="row">
                            <div class="tt-title d-inline-block float-none w-100 text-center">Có thể bạn quan tâm</div>
                            <div class="ttspecial-content products grid owl-carousel">
                                @foreach ($randomBooks as $book)
                                    <div class="product-layouts">
                                        <div class="product-thumb">
                                            <div class="image zoom">
                                                <a href="{{ route('product-detail', $book->BookID) }}">
                                                    <img src="{{ $book->Avatar }}" alt="{{ $book->BookTitle }}"
                                                         height="501" width="385"/>
                                                    <img src="{{ $book->Avatar }}" alt="{{ $book->BookTitle }}"
                                                         class="second_image img-responsive" height="501" width="385"/>
                                                </a>
                                            </div>
                                            <div class="thumb-description">
                                                <div class="caption">
                                                    <h4 class="product-title text-capitalize"><a
                                                            href="{{ route('product-detail', $book->BookID) }}">{{ $book->BookTitle }}</a>
                                                    </h4>
                                                </div>
                                                <div class="rating">
                                                    <div class="product-ratings d-inline-block align-middle">
                                                        @php
                                                            $starRatingHTML = '';

                                                            $star = $book->AVGRating >= 5 ? 5 : $book->AVGRating;
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
                                                    <div class="regular-price">{{ $book->SellingPrice }}</div>
                                                    <div class="old-price">{{ $book->CostPrice }}</div>
                                                </div>
                                                <div class="button-wrapper">
                                                    <div class="button-group text-center">
                                                        <button type="button" class="btn btn-primary btn-cart"
                                                                data-toggle="modal" data-target="#cart-pop"
                                                                data-book-name="{{ $book->BookTitle }}"
                                                                data-book-price="{{ $book->SellingPrice }}"
                                                                data-book-id="{{ $book->BookID }}"
                                                                data-book-oldPrice="{{ $book->CostPrice }}"
                                                        ><i
                                                                class="material-icons">shopping_cart</i><span>Add to
                                                            cart</span>
                                                        </button>
                                                        <a href="#" class="btn btn-primary btn-wishlist"><i
                                                                class="material-icons">favorite</i><span>wishlist</span></a>
                                                        <button type="button" class="btn btn-primary btn-compare"><i
                                                                class="material-icons">equalizer</i><span>Compare</span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-quickview"
                                                                data-toggle="modal" data-target="#product_view"
                                                                data-book-name="{{ $book->BookTitle }}"
                                                                data-book-price="{{ $book->SellingPrice }}"
                                                                data-book-des="{{ $book->Description }}"><i
                                                                class="material-icons">visibility</i><span>Quick
                                                            View</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="hometab" class="home-tab my-40 my-sm-25 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="row">
                            <div class="tt-title d-inline-block float-none w-100 text-center">Danh mục sản phẩm</div>
                            <div class="tabs">
                                <ul class="nav nav-tabs justify-content-center">
                                    <li class="nav-item "><a class="nav-link genre-link active" data-toggle="tab"
                                                             href="#" id="featured-tab"
                                                             data-conditional-id="newest">
                                            <div class="tab-title">Sách mới nhất</div>
                                        </a>
                                    </li>
                                    <li class="nav-item "><a class="nav-link genre-link" data-toggle="tab"
                                                             href="#" id="featured-tab"
                                                             data-conditional-id="most-viewed">
                                            <div class="tab-title">Xem nhiều nhất</div>
                                        </a>
                                    </li>
                                    <li class="nav-item "><a class="nav-link genre-link" data-toggle="tab"
                                                             href="#" id="featured-tab"
                                                             data-conditional-id="best-selling">
                                            <div class="tab-title">Bán chạy nhất</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content float-left w-100">
                                <div class="tab-pane active float-left w-100" id="#ttdictionary-main" role="tabpanel"
                                     aria-labelledby="dictionary-tab">
                                    <section id="ttfeatured" class="ttfeatured-products">
                                        <div class="ttfeatured-content products grid owl-carousel displayProducts"
                                             id="owl1">

                                            @foreach ($randomBooks as $book)
                                                <div class="product-layouts">
                                                    <div class="product-thumb">
                                                        <div class="image zoom">
                                                            <a href="{{ route('product-detail', $book->BookID) }}">
                                                                <img src="{{ $book->Avatar }}" alt="01"
                                                                     height="501" width="385"/>
                                                                <img src="{{ $book->Avatar }}" alt="02"
                                                                     class="second_image img-responsive" height="501" width="385"/>
                                                            </a>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4 class="product-title text-capitalize"><a
                                                                        href="{{ route('product-detail', $book->BookID) }}">{{ $book->BookTitle }}</a>
                                                                </h4>
                                                            </div>
                                                            <div class="rating">
                                                                <div class="product-ratings d-inline-block align-middle">
                                                                    @php
                                                                        $starRatingHTML = '';

                                                                        $star = $book->AVGRating >= 5 ? 5 : $book->AVGRating;
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
                                                                <div class="regular-price">{{ $book->SellingPrice}}</div>
                                                                <div class="old-price">{{ $book->CostPrice }}</div>
                                                            </div>
                                                            <div class="button-wrapper">
                                                                <div class="button-group text-center">
                                                                    <button type="button" class="btn btn-primary btn-cart"
                                                                            data-toggle="modal" data-target="#cart-pop"
                                                                            data-book-name="{{ $book->BookTitle }}"
                                                                            data-book-price="{{ $book->SellingPrice }}"
                                                                            data-book-id="{{ $book->BookID }}"
                                                                            data-book-oldPrice="{{ $book->CostPrice }}"
                                                                    >
                                                                        <i class="material-icons">shopping_cart</i>
                                                                        <span>Add to cart</span>
                                                                    </button>
                                                                    <a href="#" class="btn btn-primary btn-wishlist"><i
                                                                            class="material-icons">favorite</i><span>wishlist</span></a>
                                                                    <button type="button" class="btn btn-primary btn-compare"><i
                                                                            class="material-icons">equalizer</i><span>Compare</span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary btn-quickview"
                                                                            data-toggle="modal" data-target="#product_view"
                                                                            data-book-name="{{ $book->BookTitle }}"
                                                                            data-book-price="{{ $book->SellingPrice }}"
                                                                            data-book-des="{{ $book->Description }}"><i
                                                                            class="material-icons">visibility</i><span>Quick
                                                            View</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </section>
                                </div>
                                <div class="pagination-wrapper float-left w-100">
                                    <p id="pagination-left-text"></p>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" aria-label="Previous" id="previous-page-button">
                                                    <span aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" aria-label="Next" id="next-page-button">
                                                    <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                                                    <span class="sr-only" id="next-page-button">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="ttbrandlogo" class="my-40 my-sm-25 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="tt-brand owl-carousel">
                            <div class="item">
                                <a href="#"><img src="/user/assets/img/logos/brand-logo-01.png" alt="brand-logo-01"
                                                 width="140" height="100"></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="/user/assets/img/logos/brand-logo-02.png" alt="brand-logo-02"
                                                 width="140" height="100"></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="/user/assets/img/logos/brand-logo-03.png" alt="brand-logo-03"
                                                 width="140" height="100"></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="/user/assets/img/logos/brand-logo-04.png" alt="brand-logo-04"
                                                 width="140" height="100"></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="/user/assets/img/logos/brand-logo-05.png" alt="brand-logo-05"
                                                 width="140" height="100"></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="/user/assets/img/logos/brand-logo-06.png" alt="brand-logo-06"
                                                 width="140" height="100"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        const Paginate = {
            currentPage: 1,
            lastPage: null,
            conditional: "newest",
        }

        $(document).ready(function () {
            events.setOnClickBtnChangeGetAllCondition();
            getAllProductWith(Paginate.conditional, Paginate.currentPage);

            document.querySelector("#previous-page-button").addEventListener('click', function (){
                if(Paginate.currentPage == 1)
                {
                    Paginate.currentPage = Paginate.lastPage;
                }
                else {
                    Paginate.currentPage--;
                }

                getAllProductWith(Paginate.conditional, Paginate.currentPage);
            })
            document.querySelector("#next-page-button").addEventListener('click', function () {
                if(Paginate.currentPage == Paginate.lastPage)
                {
                    Paginate.currentPage = 1;
                }
                else {
                    Paginate.currentPage++;
                }
                getAllProductWith(Paginate.conditional, Paginate.currentPage);
            })
        });

        $('.btn-cart').click(function () {
            var bookID = $(this).data('book-id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url: '/cart/add',
                data: {
                    book_id: bookID
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    console.log('Product added to cart successfully.');
                },
                error: function (xhr, status, error) {
                    console.error('Error adding product to cart:', error);
                }
            });
        });
    </script>
@endsection
