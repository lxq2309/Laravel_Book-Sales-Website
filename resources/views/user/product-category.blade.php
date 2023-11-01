@extends('user.layout.layout')

@section('content')
    <div class="main-content w-100 float-left">
        <div class="container">
            <div class="row">
                <div class="content-wrapper col-xl-9 col-lg-9 order-lg-2">
                    <header class="product-grid-header d-flex d-xs-block d-sm-flex d-lg-flex w-100 float-left">
                        <div class="hidden-sm-down total-products d-flex d-xs-block d-lg-flex col-md-3 col-sm-3 col-xs-12 align-items-center">
                            <div class="row">
                                <div class="nav" role="tablist">
                                    <a class="grid active" href="#grid" data-toggle="tab" role="tab"
                                        aria-selected="true" aria-controls="grid"><i
                                            class="material-icons align-middle">grid_on</i></a>
                                    <a class="list" href="#list" data-toggle="tab" role="tab" aria-selected="false"
                                        aria-controls="list"><i
                                            class="material-icons align-middle">format_list_bulleted</i></a>
                                    <a class="sort" href="#sort-view" data-toggle="tab" role="tab"
                                        aria-selected="false" aria-controls="sort-view"><i
                                            class="material-icons align-middle">reorder</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-results-wrapper d-flex d-sm-flex d-xs-block d-lg-flex justify-content-end col-md-9 col-sm-9 col-xs-12">
                            <div class="shop-results d-flex align-items-center"><span>Hiện</span>
                                <div class="shop-select">
                                    <select name="number" id="number">
                                        <option value="9">9</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="shop-results d-flex align-items-center"><span>Sắp xếp theo</span>
                                <div class="shop-select">
                                    <select name="sort" id="sort">
                                        <option value="position">Mặc định</option>
                                        <option value="p-name">Nổi bật</option>
                                        <option value="p-price">Giá</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="tab-content text-center products w-100 float-left">
                        <div class="tab-pane grid fade active" id="grid" role="tabpanel">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="product-thumb">
                                        <div class="image zoom">
                                            <a href="{{ route('product-detail', $product->BookID) }}">
                                                <img src="/user/assets/img/products/01.jpg" alt="01" />
                                                <img src="/user/assets/img/products/02.jpg" alt="02"
                                                    class="second_image img-responsive" /> </a>
                                            <ul class="countdown countdown1">
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
                                                        href="{{ route('product-detail', $product->BookID) }}">{{$product->BookTitle}}</a></h4>
                                            </div>
                                            <div class="rating">
                                                <div class="product-ratings d-inline-block align-middle">
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                                </div>
                                            </div>

                                            <div class="price">
                                                <div class="regular-price">{{ $product->SellingPrice }}</div>
                                                <div class="old-price">{{ $product->CostPrice }}</div>
                                            </div>
                                            <div class="button-wrapper">
                                                <div class="button-group text-center">
                                                    <button type="button" class="btn btn-primary btn-cart"
                                                        data-target="#cart-pop" data-toggle="modal" disabled><i
                                                            class="material-icons">shopping_cart</i><span>Out of
                                                            stock</span></button>
                                                    <a href="wishlist.html" class="btn btn-primary btn-wishlist"><i
                                                            class="material-icons">favorite</i><span>wishlist</span></a>
                                                    <button type="button" class="btn btn-primary btn-compare"><i
                                                            class="material-icons">equalizer</i><span>Compare</span></button>
                                                    <button type="button" class="btn btn-primary btn-quickview"
                                                        data-toggle="modal" data-target="#product_view"><i
                                                            class="material-icons">visibility</i><span>Quick
                                                            View</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade list text-left" id="list" role="tabpanel">
                            @foreach($products as $product)
                            <div class="product-layouts">
                                <div class="product-thumb row">
                                    <div class="image zoom col-xs-12 col-sm-5 col-md-4">
                                        <a href="{{ route('product-detail', $product->BookID) }}" class="d-block position-relative">
                                            <img src="/user/assets/img/products/01.jpg" alt="01" />
                                            <img src="/user/assets/img/products/02.jpg" alt="02"
                                                 class="second_image img-responsive" />
                                        </a>
                                        <ul class="countdown countdown4 text-center">
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
                                    <div class="thumb-description col-xs-12 col-sm-7 col-md-8 position-static text-left">
                                        <div class="caption">
                                            <h4 class="product-title text-capitalize"><a
                                                    href="{{ route('product-detail', $product->BookID) }}">{{ $product->BookTitle }}</a></h4>
                                        </div>
                                        <div class="rating mb-10">
                                            <div class="product-ratings d-inline-block align-middle">
                                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                                <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                            </div>
                                        </div>

                                        <div class="description">
                                            {{ $product->Description }} </div>

                                        <div class="price">
                                            <div class="regular-price">{{ $product->SellingPrice }}</div>
                                            <div class="old-price">{{ $product->CostPrice }}</div>
                                        </div>
                                        <div class="color-option d-flex align-items-center float-left w-100">
                                            <ul class="color-categories">
                                                <li>
                                                    <a class="tt-pink" href="#" title="Pink"></a>
                                                </li>
                                                <li>
                                                    <a class="tt-blue" href="#" title="Blue"></a>
                                                </li>
                                                <li>
                                                    <a class="tt-yellow" href="#" title="Yellow"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="button-wrapper">
                                            <div class="button-group text-center">
                                                <button type="button" class="btn btn-primary btn-cart"
                                                        data-target="#cart-pop" data-toggle="modal" disabled="disabled"><i
                                                        class="material-icons">shopping_cart</i><span>out of
                                                        stock</span></button>
                                                <a href="wishlist.html" class="btn btn-primary btn-wishlist"><i
                                                        class="material-icons">favorite</i><span>wishlist</span></a>
                                                <button type="button" class="btn btn-primary btn-compare"><i
                                                        class="material-icons">equalizer</i><span>Compare</span></button>
                                                <button type="button" class="btn btn-primary btn-quickview"
                                                        data-toggle="modal" data-target="#product_view"><i
                                                        class="material-icons">visibility</i><span>Quick
                                                        View</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="tab-pane fade sort text-left" id="sort-view" role="tabpanel">
                            @foreach($products as $product)
                            <div class="product-layouts">
                                <div class="product-thumb row">
                                    <div class="image zoom col-xs-12 col-sm-3 col-md-2">
                                        <a href="{{ route('product-detail', $product->BookID) }}" class="d-block position-relative">
                                            <img src="/user/assets/img/products/01.jpg" alt="01" />
                                            <img src="/user/assets/img/products/02.jpg" alt="02"
                                                 class="second_image img-responsive" /> </a>
                                    </div>
                                    <div class="thumb-description col-xs-12 col-sm-9 col-md-10 position-static text-left">
                                        <div class="sort-title col-md-5 col-sm-7 float-left">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="{{ route('product-detail', $product->BookID) }}">{{ $product->BookTitle }}</a></h4>
                                            </div>

                                            <div class="rating mb-10">
                                                <div class="product-ratings d-inline-block align-middle">
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                </div>
                                            </div>
                                            <div class="description mb-10">
                                                {{ $product->Description }} </div>
                                            <div class="color-option d-flex align-items-center float-left w-100">
                                                <ul class="color-categories">
                                                    <li>
                                                        <a class="tt-pink" href="#" title="Pink"></a>
                                                    </li>
                                                    <li>
                                                        <a class="tt-blue" href="#" title="Blue"></a>
                                                    </li>
                                                    <li>
                                                        <a class="tt-yellow" href="#" title="Yellow"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div
                                            class="price-main col-md-3 col-sm-5 float-left text-center text-sm-center text-xs-left">
                                            <div class="price">
                                                <div class="regular-price">{{ $product->SellingPrice }}</div>
                                                <div class="old-price">{{ $product->CostPrice }}</div>
                                            </div>
                                        </div>
                                        <div
                                            class="button-wrapper col-md-4 col-sm-5 float-left text-center text-md-center text-sm-center text-xs-left">
                                            <div class="button-group text-center">
                                                <button type="button" class="btn btn-primary btn-cart"
                                                        data-target="#cart-pop" data-toggle="modal" disabled="disabled"><i
                                                        class="material-icons">shopping_cart</i><span>out of
                                                        stock</span></button>
                                                <a href="wishlist.html" class="btn btn-primary btn-wishlist"><i
                                                        class="material-icons">favorite</i><span>wishlist</span></a>
                                                <button type="button" class="btn btn-primary btn-compare"><i
                                                        class="material-icons">equalizer</i><span>Compare</span></button>
                                                <button type="button" class="btn btn-primary btn-quickview"
                                                        data-toggle="modal" data-target="#product_view"><i
                                                        class="material-icons">visibility</i><span>Quick
                                                        View</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="pagination-wrapper float-left w-100">
                        <p>Showing 1 to 9 of 11 (2 Pages)</p>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="left-column sidebar col-xl-3 col-lg-3 order-lg-1">
                    <div class="sidebar-filter left-sidebar w-100 float-left">
                        <div class="title">
                            <a data-toggle="collapse" href="#sidebar-main" aria-expanded="false"
                                aria-controls="sidebar-main" class="d-lg-none block-toggler">Product Categories</a>
                        </div>
                        <div id="sidebar-main" class="sidebar-main collapse">
                            <div class="sidebar-block categories">
                                <h3 class="widget-title"><a data-toggle="collapse" href="#categoriesMenu"
                                        role="button" aria-expanded="true" aria-controls="categoriesMenu">Nhóm sản
                                        phẩm</a></h3>
                                @foreach ($formattedCategories as $category)
                                <div id="categoriesMenu" class="expand-lg collapse show">
                                    <div class="nav nav-pills flex-column mt-4"> <a href="#"
                                            class="nav-link d-flex justify-content-between mb-2 "><span>{{ $category['name'] }}</span><span class="sidebar-badge"></span></a>
                                        @foreach ($category['genres'] as $genre)
                                        <div class="nav nav-pills flex-column ml-3">
                                            <a href="#" class="nav-link mb-2">{{ $genre->GenreName }}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="sidebar-block price">
                                <h3 class="widget-title"><a data-toggle="collapse" href="#price" role="button"
                                        aria-expanded="true" aria-controls="price">Giá</a></h3>
{{--                                <div id="price" class="collapse show">--}}
{{--                                    <div class="price-inner">--}}
{{--                                        <label for="amount">Mức giá:</label>--}}
{{--                                        <input type="text" id="amount" readonly--}}
{{--                                            style="border:0; font-weight:bold; background:none;">--}}
{{--                                        <div id="slider-range"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                    <div>
                                        <input type="checkbox" id="checkbox-id" class="checkbox-class"> 0-150000đ
                                    </div>

                            </div>
                            <div class="sidebar-block size">
                                <h3 class="widget-title"><a data-toggle="collapse" href="#size" role="button"
                                        aria-expanded="true" aria-controls="size">Độ tuổi</a></h3>
                                <div id="size" class="sidebar-widget-option-wrapper collapse show">
                                    <div class="size-inner">
                                        <div class="sidebar-widget-option">
                                            <input type="checkbox" id="size-1">
                                            <label for="size-1">18+</label>
                                        </div>
                                        <div class="sidebar-widget-option">
                                            <input type="checkbox" id="size-2">
                                            <label for="size-2">16+</label>
                                        </div>
                                        <div class="sidebar-widget-option">
                                            <input type="checkbox" id="size-3">
                                            <label for="size-3">15 - 18</label>
                                        </div>
                                        <div class="sidebar-widget-option">
                                            <input type="checkbox" id="size-4">
                                            <label for="size-4">11 - 15</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-left-banner left-sidebar w-100 float-left">
                        <div class="ttleftbanner">
                            <a href="#">
                                <img src="/user/assets/img/banner/left-banner.jpg" alt="left-banner" />
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-product left-sidebar w-100 float-left">
                        <div class="title">
                            <a data-toggle="collapse" href="#sidebar-product" aria-expanded="false"
                                aria-controls="sidebar-product" class="d-lg-none block-toggler">sale products</a>
                        </div>
                        <div id="sidebar-product" class="collapse w-100 float-left">
                            <div class="sidebar-block sale ">
                                <h3 class="widget-title text-capitalize">sale products</h3>
                                <div class="products owl-carousel">
                                    <div class="sale-col">
                                        <div class="product-layouts">
                                            <div class="product-thumb">
                                                <div class="image col-sm-4 float-left">
                                                    <a href="#">
                                                        <img src="/user/assets/img/products/01.jpg" alt="01" />
                                                    </a>
                                                </div>
                                                <div class="thumb-description col-sm-8 text-left float-left">
                                                    <div class="caption">
                                                        <h4 class="product-title text-capitalize"><a
                                                                href="product-details.html">aliquam quaerat voluptatem</a>
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
                                                        <div class="regular-price">$100.00</div>
                                                        <div class="old-price">$150.00</div>
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <div class="button-group text-center">
                                                            <button type="button" class="btn btn-primary btn-cart"
                                                                data-target="#cart-pop" data-toggle="modal"><i
                                                                    class="material-icons">shopping_cart</i><span>Add to
                                                                    cart</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-layouts">
                                            <div class="product-thumb">
                                                <div class="image col-sm-4 float-left">
                                                    <a href="#">
                                                        <img src="/user/assets/img/products/02.jpg" alt="01" />
                                                    </a>
                                                </div>
                                                <div class="thumb-description col-sm-8 text-left float-left">
                                                    <div class="caption">
                                                        <h4 class="product-title text-capitalize"><a
                                                                href="product-details.html">aspetur autodit autfugit</a>
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
                                                        <div class="regular-price">$100.00</div>
                                                        <div class="old-price">$150.00</div>
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <div class="button-group text-center">
                                                            <button type="button" class="btn btn-primary btn-cart"
                                                                data-target="#cart-pop" data-toggle="modal"><i
                                                                    class="material-icons">shopping_cart</i><span>Add to
                                                                    cart</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-layouts">
                                            <div class="product-thumb">
                                                <div class="image col-sm-4 float-left">
                                                    <a href="#">
                                                        <img src="/user/assets/img/products/03.jpg" alt="03" />
                                                    </a>
                                                </div>
                                                <div class="thumb-description col-sm-8 text-left float-left">
                                                    <div class="caption">
                                                        <h4 class="product-title text-capitalize"><a
                                                                href="product-details.html">magni dolores eosquies</a>
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
                                                        <div class="regular-price">$100.00</div>
                                                        <div class="old-price">$150.00</div>
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <div class="button-group text-center">
                                                            <button type="button" class="btn btn-primary btn-cart"
                                                                data-target="#cart-pop" data-toggle="modal"><i
                                                                    class="material-icons">shopping_cart</i><span>Add to
                                                                    cart</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sale-col">

                                        <div class="product-layouts">
                                            <div class="product-thumb">
                                                <div class="image col-sm-4 float-left">
                                                    <a href="#">
                                                        <img src="/user/assets/img/products/04.jpg" alt="04" />
                                                    </a>
                                                </div>
                                                <div class="thumb-description col-sm-8 text-left float-left">
                                                    <div class="caption">
                                                        <h4 class="product-title text-capitalize"><a
                                                                href="product-details.html">voluptas nulla pariatur</a>
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
                                                        <div class="regular-price">$100.00</div>
                                                        <div class="old-price">$150.00</div>
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <div class="button-group text-center">
                                                            <button type="button" class="btn btn-primary btn-cart"
                                                                data-target="#cart-pop" data-toggle="modal"><i
                                                                    class="material-icons">shopping_cart</i><span>Add to
                                                                    cart</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-layouts">
                                            <div class="product-thumb">
                                                <div class="image col-sm-4 float-left">
                                                    <a href="#">
                                                        <img src="/user/assets/img/products/05.jpg" alt="05" />
                                                    </a>
                                                </div>
                                                <div class="thumb-description col-sm-8 text-left float-left">
                                                    <div class="caption">
                                                        <h4 class="product-title text-capitalize"><a
                                                                href="product-details.html">aliquam quat voluptatem</a>
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
                                                        <div class="regular-price">$100.00</div>
                                                        <div class="old-price">$150.00</div>
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <div class="button-group text-center">
                                                            <button type="button" class="btn btn-primary btn-cart"
                                                                data-target="#cart-pop" data-toggle="modal"><i
                                                                    class="material-icons">shopping_cart</i><span>Add to
                                                                    cart</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product_view modal -->
    <div class="modal fade product_view" id="product_view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100w-100w-100 font-weight-bold d-none">Quick view</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 left-columm">
                            <div class="product-large-image tab-content">
                                <div class="tab-pane active" id="product-1" role="tabpanel"
                                     aria-labelledby="product-tab-1">
                                    <div class="single-img img-full">
                                        <a href="/user/assets/img/products/01.jpg"><img
                                                src="/user/assets/img/products/01.jpg" class="img-fluid" alt=""
                                                width="368" height="478"></a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-2" role="tabpanel" aria-labelledby="product-tab-2">
                                    <div class="single-img">
                                        <a href="/user/assets/img/products/02.jpg"><img
                                                src="/user/assets/img/products/02.jpg" class="img-fluid" alt=""
                                                width="368" height="478"></a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-3" role="tabpanel" aria-labelledby="product-tab-3">
                                    <div class="single-img">
                                        <a href="/user/assets/img/products/03.jpg"><img
                                                src="/user/assets/img/products/03.jpg" class="img-fluid" alt=""
                                                width="368" height="478"></a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-4" role="tabpanel" aria-labelledby="product-tab-4">
                                    <div class="single-img">
                                        <a href="/user/assets/img/products/04.jpg"><img
                                                src="/user/assets/img/products/04.jpg" class="img-fluid" alt=""
                                                width="368" height="478"></a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-5" role="tabpanel" aria-labelledby="product-tab-5">
                                    <div class="single-img">
                                        <a href="/user/assets/img/products/05.jpg"><img
                                                src="/user/assets/img/products/05.jpg" class="img-fluid" alt=""
                                                width="368" height="478"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="small-image-list float-left w-100">
                                <div class="nav-add small-image-slider-single-product-tabstyle-3 owl-carousel"
                                     role="tablist">
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-1" href="#product-1"
                                           class="img active"><img src="/user/assets/img/products/01.jpg"
                                                                   class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-2" href="#product-2" class="img"><img
                                                src="/user/assets/img/products/02.jpg" class="img-fluid"
                                                alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-3" href="#product-3" class="img"><img
                                                src="/user/assets/img/products/03.jpg" class="img-fluid"
                                                alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-4" href="#product-4" class="img"><img
                                                src="/user/assets/img/products/04.jpg" class="img-fluid"
                                                alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-5" href="#product-5" class="img"><img
                                                src="/user/assets/img/products/05.jpg" class="img-fluid"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 product_content">
                            <h4 class="product-title text-capitalize">${product.BookTitle}</h4>
                            <div class="rating">
                                <div class="product-ratings d-inline-block align-middle">
                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                    <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                    <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                </div>
                            </div>
                            <span class="description float-left w-100">${product.Description}</span>
                            <h3 class="price float-left w-100"><span
                                    class="regular-price align-middle">${product.SellingPrice}</span><span
                                    class="old-price align-middle">${product.CostPrice}</span></h3>

                            <div class="product-variants float-left w-100">
                                <div class="col-md-4 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Size: ${product.Size}</h5>

                                </div>
                                <div class="color-option d-flex align-items-center">
                                    <h5>color :</h5>
                                    <ul class="color-categories">
                                        <li class="active">
                                            <a class="tt-pink" href="#" title="Pink"></a>
                                        </li>
                                        <li>
                                            <a class="tt-blue" href="#" title="Blue"></a>
                                        </li>
                                        <li>
                                            <a class="tt-yellow" href="#" title="Yellow"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn-cart d-flex align-items-center float-left w-100">
                                <h5>qty:</h5>
                                <input value="1" type="number">
                                <button type="button" class="btn btn-primary"><i
                                        class="material-icons">shopping_cart</i> Add To Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5ac1aabb4b401e45400e4197/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();


        /**
         * Khởi tạo cửa sổ
         */
        window.onload = (function() {
            initEvents();
        })

        /**
         * Khởi tạo các sự kiện
         */
        function initEvents() {
            events.setOnClickBtnQuickView();
            events.setOnClickBtnChangeGenre();
        }

        const events = {
            /**
             * Bắt sự kiện cho các nút Xem trước sản phẩm
             */
            setOnClickBtnQuickView() {
                var quickViewButtons = document.querySelectorAll('.btn-quickview');

                quickViewButtons.forEach(function(button) {
                    button.addEventListener('click', events.showModalProductDetail);
                });
            },

            /**
             * Bắt sự kiện cho các nút chọn Thể loại (bên dưới Xu hướng mua sắm)
             */
            setOnClickBtnChangeGenre() {
                var btnChangeGenre = document.querySelectorAll('.nav-link.genre-link#featured-tab');
                console.log(btnChangeGenre);

                btnChangeGenre.forEach(function(button) {
                    button.addEventListener('click', events.btnChangeGenreOnClick);
                });
            },
            /**
             * Xử lí sự kiện chọn thể loại
             */
            btnChangeGenreOnClick() {
                // Kiểm tra xem sự kiện click có xuất phát từ một liên kết thể loại không
                console.log(this);
                if (this.classList.contains('genre-link')) {
                    var genreID = this.getAttribute('data-genre-id'); // Lấy ID của thể loại từ thuộc tính data

                    // Gửi yêu cầu AJAX sử dụng Fetch API
                    fetch(`/api/category/${genreID}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            // Bạn cũng có thể thêm các headers khác nếu cần thiết
                        },
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            var products = data.products;
                            var productsHTML = products.map(product => `
                <div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
												<div class="product-thumb">
													<div class="image zoom">
														<a href="/product-detail/${product.BookID}">
														<img src="/user/assets/img/products/01.jpg" alt="01" height="501" width="385"/>
														<img src="/user/assets/img/products/02.jpg" alt="02" class="second_image img-responsive" height="501" width="385"/>										</a>
														<ul class="countdown1 countdown">
															<li><span class="days">00</span><p class="days_text">Days</p></li>
															<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
															<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
															<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
														</ul>
													</div>
													<div class="thumb-description">
														<div class="caption">
															<h4 class="product-title text-capitalize"><a href="/product-detail/${product.BookID}">${product.BookTitle}</a></h4>
														</div>
														<div class="rating">
														<div class="product-ratings d-inline-block align-middle">
															<span class="fa fa-stack"><i class="material-icons">star</i></span>
														<span class="fa fa-stack"><i class="material-icons">star</i></span>
														<span class="fa fa-stack"><i class="material-icons">star</i></span>
														<span class="fa fa-stack"><i class="material-icons off">star</i></span>
														<span class="fa fa-stack"><i class="material-icons off">star</i></span>										</div>
														</div>
														<div class="price">
															<div class="regular-price">${product.SellingPrice}</div>
															<div class="old-price">${product.CostPrice}</div>
														</div>
														<div class="button-wrapper">
														<div class="button-group text-center">
															<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal" disabled="disabled"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
															<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
															<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
															<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view"><i class="material-icons">visibility</i><span>Quick View</span></button>
														</div>
														</div>
													</div>
												</div>
                                             </div>
            `).join('');

                            // Xóa tất cả các sản phẩm cũ và thêm sản phẩm mới vào container
                            document.querySelector(".displayProducts").innerHTML = productsHTML;
                            // ???????????????clgt
                            events.setOnClickBtnQuickView();
                        })
                        .catch(error => {
                            console.error('There has been a problem with your fetch operation:', error);
                        });
                }
            },


            /**
             * Hiển thị modal chi tiết sản phẩm
             */
            showModalProductDetail() {
                var productID = this.closest('.product-layouts').querySelector('a').getAttribute('href').split('/')
                    .pop();

                console.log(productID);

                fetch('/api/product/' + productID)
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        var book = data.products[0];
                        console.log(book);
                        // Hiển thị dữ liệu sản phẩm trong modal/pop-up
                        var productHTML = `
                        <div class="modal-header">
                <h4 class="modal-title w-100w-100w-100 font-weight-bold d-none">Quick view</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 left-columm">
                        <div class="product-large-image tab-content">
                            <div class="tab-pane active" id="product-1" role="tabpanel" aria-labelledby="product-tab-1">
                                <div class="single-img img-full">
                                    <a href="/user/assets/img/products/01.jpg"><img src="/user/assets/img/products/01.jpg" class="img-fluid" alt="" width="368" height="478"></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-2" role="tabpanel" aria-labelledby="product-tab-2">
                                <div class="single-img">
                                    <a href="/user/assets/img/products/02.jpg"><img src="/user/assets/img/products/02.jpg" class="img-fluid" alt="" width="368" height="478"></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-3" role="tabpanel" aria-labelledby="product-tab-3">
                                <div class="single-img">
                                    <a href="/user/assets/img/products/03.jpg"><img src="/user/assets/img/products/03.jpg" class="img-fluid" alt="" width="368" height="478"></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-4" role="tabpanel" aria-labelledby="product-tab-4">
                                <div class="single-img">
                                    <a href="/user/assets/img/products/04.jpg"><img src="/user/assets/img/products/04.jpg" class="img-fluid" alt="" width="368" height="478"></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-5" role="tabpanel" aria-labelledby="product-tab-5">
                                <div class="single-img">
                                    <a href="/user/assets/img/products/05.jpg"><img src="/user/assets/img/products/05.jpg" class="img-fluid" alt="" width="368" height="478"></a>
                                </div>
                            </div>
                        </div>
                        <div class="small-image-list float-left w-100">
                            <div class="nav-add small-image-slider-single-product-tabstyle-3 owl-carousel" role="tablist">
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-1" href="#product-1" class="img active"><img src="/user/assets/img/products/01.jpg" class="img-fluid" alt=""></a>
                                </div>
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-2" href="#product-2" class="img"><img src="/user/assets/img/products/02.jpg" class="img-fluid" alt=""></a>
                                </div>
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-3" href="#product-3" class="img"><img src="/user/assets/img/products/03.jpg" class="img-fluid" alt=""></a>
                                </div>
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-4" href="#product-4" class="img"><img src="/user/assets/img/products/04.jpg" class="img-fluid" alt=""></a>
                                </div>
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-5" href="#product-5" class="img"><img src="/user/assets/img/products/05.jpg" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 product_content">
                        <h4 class="product-title text-capitalize">${book.BookTitle}</h4>
                        <div class="rating">
                            <div class="product-ratings d-inline-block align-middle">
                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                <span class="fa fa-stack"><i class="material-icons off">star</i></span>			</div>							</div>
                        <span class="description float-left w-100">${book.Description}</span>
                        <h3 class="price float-left w-100"><span class="regular-price align-middle">${book.SellingPrice}</span><span class="old-price align-middle">${book.CostPrice}</span></h3>

                        <div class="product-variants float-left w-100">
                            <div class="col-md-4 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                <h5>Size: ${book.Size}</h5>

                            </div>
                            <div class="color-option d-flex align-items-center">
                                <h5>color :</h5>
                                <ul class="color-categories">
                                    <li class="active">
                                        <a class="tt-pink" href="#" title="Pink"></a>                                            </li>
                                    <li>
                                        <a class="tt-blue" href="#" title="Blue"></a>                                            </li>
                                    <li>
                                        <a class="tt-yellow" href="#" title="Yellow"></a>                                            </li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-cart d-flex align-items-center float-left w-100">
                            <h5>qty:</h5>
                            <input value="1" type="number">
                            <button type="button" class="btn btn-primary"><i class="material-icons">shopping_cart</i> Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
                    `;

                        document.querySelector(".modal-content").innerHTML = productHTML;
                    })
                    .catch(function(error) {
                        console.log('Error loading product data:', error);
                    });
            }
        }
    </script>
@endsection
