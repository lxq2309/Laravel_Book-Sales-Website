@extends('user.layout.layout')

@section('content')
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
                                @foreach ($books as $id => $book)
                                    <div class="product-layouts">
                                        <div class="product-thumb">
                                            <div class="image zoom">
                                                <a href="{{ route('product-detail', $book->BookID) }}">
                                                    <img src="/user/assets/img/products/01.jpg" alt="01"
                                                         height="501" width="385"/>
                                                    <img src="/user/assets/img/products/02.jpg" alt="02"
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
                                                        <span class="fa fa-stack"><i
                                                                class="material-icons">star</i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="material-icons">star</i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="material-icons">star</i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="material-icons off">star</i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="material-icons off">star</i></span>
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
                                                        ><i
                                                                class="material-icons">shopping_cart</i><span>Add to
                                                            cart</span>
                                                        </button>
                                                        <a href="wishlist.html" class="btn btn-primary btn-wishlist"><i
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
                            <div class="tt-title d-inline-block float-none w-100 text-center">Xu hướng mua sắm</div>
                            <div class="tabs">
                                <ul class="nav nav-tabs justify-content-center">
                                    @foreach ($genres as $id => $genre)
                                        <li class="nav-item "><a class="nav-link genre-link" data-toggle="tab"
                                                                 href="#" id="featured-tab"
                                                                 data-genre-id="{{ $genre->GenreID }}">
                                                <div class="tab-title">{{ $genre->GenreName }}</div>
                                            </a></li>
                                    @endforeach
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#"
                                                            id="bestseller-tab">
                                            <div class="tab-title">Other Languages</div>
                                        </a></li>
                                </ul>
                            </div>
                            <div class="tab-content float-left w-100">
                                <div class="tab-pane active float-left w-100" id="#ttdictionary-main" role="tabpanel"
                                     aria-labelledby="dictionary-tab">
                                    <section id="ttfeatured" class="ttfeatured-products">
                                        <div class="ttfeatured-content products grid owl-carousel displayProducts"
                                             id="owl1">


                                            @foreach($books as $book)
                                                <div class="product-layouts">
                                                    <div class="product-thumb">
                                                        <div class="image zoom">
                                                            <a href="{{ route('product-detail', $book->BookID) }}">
                                                                <img src="/user/assets/img/products/01.jpg" alt="01"
                                                                     height="501" width="385"/>
                                                                <img src="/user/assets/img/products/02.jpg" alt="02"
                                                                     class="second_image img-responsive" height="501"
                                                                     width="385"/> </a>
                                                            <ul class="countdown1 countdown">
                                                                <li><span class="days">00</span>
                                                                    <p class="days_text">Days</p>
                                                                </li>
                                                                <li><span class="hours">00</span>
                                                                    <p class="hours_text">Hours</p>
                                                                </li>
                                                                <li><span class="minutes">00</span>
                                                                    <p class="minutes_text">Minutes</p>
                                                                </li>
                                                                <li><span class="seconds">00</span>
                                                                    <p class="seconds_text">Seconds</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4 class="product-title text-capitalize"><a
                                                                        href="{{ route('product-detail', $book->BookID) }}">{{ $book->BookTitle }}</a>
                                                                </h4>
                                                            </div>
                                                            <div class="rating">
                                                                <div
                                                                    class="product-ratings d-inline-block align-middle">
                                                            <span class="fa fa-stack"><i
                                                                    class="material-icons">star</i></span>
                                                                    <span class="fa fa-stack"><i
                                                                            class="material-icons">star</i></span>
                                                                    <span class="fa fa-stack"><i
                                                                            class="material-icons">star</i></span>
                                                                    <span class="fa fa-stack"><i
                                                                            class="material-icons off">star</i></span>
                                                                    <span class="fa fa-stack"><i
                                                                            class="material-icons off">star</i></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                <div
                                                                    class="regular-price">{{ $book->SellingPrice }}</div>
                                                                <div class="old-price">{{ $book->CostPrice }}</div>
                                                            </div>
                                                            <div class="button-wrapper">
                                                                <div class="button-group text-center">
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-cart"
                                                                            data-target="#cart-pop" data-toggle="modal"
                                                                            disabled="disabled"><i
                                                                            class="material-icons">shopping_cart</i><span>Add
                                                                    to cart</span>
                                                                    </button>
                                                                    <a href="wishlist.html"
                                                                       class="btn btn-primary btn-wishlist"><i
                                                                            class="material-icons">favorite</i><span>wishlist</span></a>
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-compare"><i
                                                                            class="material-icons">equalizer</i><span>Compare</span>
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-quickview"
                                                                            data-toggle="modal"
                                                                            data-target="#product_view"
                                                                    >
                                                                        <i class="material-icons">visibility</i><span>Quick
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
        $(document).ready(function(){
            events.setOnClickBtnChangeGenre();
        });
    </script>
@endsection
