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
                                <img src="/user/assets/img/slider/slider-01.jpg" alt="" />
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-02.jpg" alt="" />
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-03.jpg" alt="" />
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-04.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="banner-sale">
                    <div class="slider">
                        <div class="col-md-12 d-flex align-items-start">
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-01.jpg" style="border-radius: 10px;" />
                            </a>
                        </div>
                        <div class="col-md-12 align-items-end">
                            <a href="#">
                                <img src="/user/assets/img/slider/slider-02.jpg" style="border-radius: 10px;" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-between" style="margin-top: 10px;">
                <div class="d-flex align-items-start">
                    <a href="#">
                        <img src="/user/assets/img/slider/Mini_Banner_1.png" />
                    </a>
                </div>
                <div class="align-items-end">
                    <a href="#">
                        <img src="/user/assets/img/slider/Mini_Banner_2.png" />
                    </a>
                </div>
                <div class="align-items-end">
                    <a href="#">
                        <img src="/user/assets/img/slider/Mini_Banner_3.png" />
                    </a>
                </div>
                <div class="align-items-end">
                    <a href="#">
                        <img src="/user/assets/img/slider/Mini_Banner_4.png" />
                    </a>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div id="main">
                <div id="ttspecial" class="ttspecial my-40 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="row">
                            <div class="tt-title d-inline-block float-none w-100 text-center">Có thể bạn không cần</div>
                            <div class="ttspecial-content products grid owl-carousel">
                                @foreach ($books as $id => $book)
                                    <div class="product-layouts">
                                        <div class="product-thumb">
                                            <div class="image zoom">
                                                <a href="{{ route('product-detail', $book->BookID) }}">
                                                    <img src="/user/assets/img/products/01.jpg" alt="01"
                                                        height="501" width="385" />
                                                    <img src="/user/assets/img/products/02.jpg" alt="02"
                                                        class="second_image img-responsive" height="501" width="385" />
                                                </a>
                                                <ul class="countdown3 countdown">
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
                                                            href="{{ route('product-detail', $book->BookID) }}">Checked
                                                            Polo Collar T-shirt</a></h4>
                                                </div>
                                                <div class="rating">
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
                                                <div class="price">
                                                    <div class="regular-price">{{ $book->SellingPrice }}</div>
                                                    <div class="old-price">{{ $book->CostPrice }}</div>
                                                </div>
                                                <div class="button-wrapper">
                                                    <div class="button-group text-center">
                                                        <button type="button" class="btn btn-primary btn-cart"
                                                            data-toggle="modal" data-target="#product_view"
                                                            disabled="disabled"><i
                                                                class="material-icons">shopping_cart</i><span>Add to
                                                                cart</span>
                                                        </button>
                                                        <a href="wishlist.html" class="btn btn-primary btn-wishlist"><i
                                                                class="material-icons">favorite</i><span>wishlist</span></a>
                                                        <button type="button" class="btn btn-primary btn-compare"><i
                                                                class="material-icons">equalizer</i><span>Compare</span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-quickview"
                                                            data-toggle="modal" data-target="#product_view"><i
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
                                                href="#" id="featured-tab" data-genre-id="{{ $genre->GenreID }}">
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
                                                                height="501" width="385" />
                                                            <img src="/user/assets/img/products/02.jpg" alt="02"
                                                                class="second_image img-responsive" height="501"
                                                                width="385" /> </a>
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
                                                                    data-toggle="modal" data-target="#product_view">
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
    <script>
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

                        document.querySelector(".modal .product_view").innerHTML = productHTML;
                    })
                    .catch(function(error) {
                        console.log('Error loading product data:', error);
                    });
            },

            /**
             *
             */
            handleCheckBox() {
                const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                const sortSelect = document.getElementById('sort');
                const applyFilters = () => {
                    const selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked)
                        .map(checkbox => ({ id: checkbox.id.toString(), name: checkbox.name.trim() }));

                    const selectedSortValue = sortSelect.value;

                    console.log(selectedCheckboxes);
                    console.log(selectedSortValue);



                    fetch('/api/product/searchByFilter', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({checkboxes: selectedCheckboxes, sort: selectedSortValue})

                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            var books = data.results;
                            var proFilHTML1 = books.map(book => `<div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="product-thumb">
                                        <div class="image zoom">
                                            <a href="/product-detail/${book.BookID}">
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
                                                        href="/product-detail/${book.BookID}">${book.BookTitle}</a></h4>
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
                                                <div class="regular-price">${book.SellingPrice}</div>
                                                <div class="old-price">${book.CostPrice}</div>
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
                                </div>`).join('');
                            var proFilHTML2 = books.map(book => `<div class="product-layouts">
                                <div class="product-thumb row">
                                    <div class="image zoom col-xs-12 col-sm-5 col-md-4">
                                        <a href="/product-detail/${book.BookID}" class="d-block position-relative">
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
                                                    href="/product-detail/${book.BookID}">${book.BookTitle}</a></h4>
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
                                            ${book.Description} </div>

                                        <div class="price">
                                            <div class="regular-price">${book.SellingPrice}</div>
                                            <div class="old-price">${book.CostPrice}</div>
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
                            </div>`).join('');
                            var proFilHTML3 = books.map(book => `<div class="product-layouts">
                                <div class="product-thumb row">
                                    <div class="image zoom col-xs-12 col-sm-3 col-md-2">
                                        <a href="/product-detail/${book.BookID}" class="d-block position-relative">
                                            <img src="/user/assets/img/products/01.jpg" alt="01" />
                                            <img src="/user/assets/img/products/02.jpg" alt="02"
                                                 class="second_image img-responsive" /> </a>
                                    </div>
                                    <div class="thumb-description col-xs-12 col-sm-9 col-md-10 position-static text-left">
                                        <div class="sort-title col-md-5 col-sm-7 float-left">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="/product-detail/${book.BookID}">${book.BookTitle}</a></h4>
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
                                                ${book.Description} </div>
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
                                                <div class="regular-price">${book.SellingPrice}</div>
                                                <div class="old-price">${book.CostPrice}</div>
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
                            </div>`).join('');
                            document.querySelector('.showProFilter1').innerHTML = proFilHTML1;
                            document.querySelector('.showProFilter2').innerHTML = proFilHTML2;
                            document.querySelector('.showProFilter3').innerHTML = proFilHTML3;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                };

                // Bắt sự kiện change cho checkboxes
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', applyFilters);
                });

                // Bắt sự kiện change cho dropdown
                sortSelect.addEventListener('change', applyFilters);

            }





        }


        // Lấy tất cả các checkboxes trong group1
        // Lấy tất cả các nhóm checkboxes
        const checkboxGroups = document.querySelectorAll('input[type="checkbox"][name^="group"]');

        // Gán sự kiện change cho từng nhóm checkboxes
        checkboxGroups.forEach(group => {
            group.addEventListener('change', function() {
                // Lấy tất cả các checkboxes trong nhóm của checkbox được chọn
                const checkboxesInGroup = document.querySelectorAll(`input[type="checkbox"][name="${this.name}"]`);

                // Nếu checkbox này được chọn, hủy chọn các checkboxes khác trong nhóm
                if (this.checked) {
                    checkboxesInGroup.forEach(checkbox => {
                        if (checkbox !== this) {
                            checkbox.checked = false;
                        }
                    });
                }
            });
        });
    </script>
@endsection
