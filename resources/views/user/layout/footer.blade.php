<!-- Footer -->
<div class="block-newsletter">
    <div class="parallax" data-source-url="/user/assets/img/banner/parallax.jpg"
         style="background-image:url(img/banner/parallax.jpg); background-position:50% 65.8718%;">
        <div class="container">
            <div class="tt-newsletter col-sm-7">
                <h2 class="text-uppercase">Đăng ký nhận bản tin</h2>
            </div>
            <div class="block-content col-sm-5">
                <form method="post" action="contact-us.html">
                    <div class="input-group">
                        <input type="email" name="email" value="" placeholder="Nhập địa chỉ email của bạn..."
                               required="" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-theme text-uppercase btn-primary" type="submit">Đăng ký</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="page-footer font-small footer-default">
    <div class="container text-center text-md-left">
        <div class="row">
            <div class="col-md-3 footer-cms footer-column">
                <div class="ttcmsfooter">
                    <div class="footer-logo"><img src="/user/assets/img/logos/footer-logo.png" alt="footer-logo"
                                                  width="200" height="50"></div>
                    <div class="footer-desc">At vero eos et accusamus et iusto odio dignissimos ducimus, duis faucibus
                        enim vitae
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-column">
                <div class="title">
                    <a href="#dichvu" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse"
                       aria-expanded="false">dịch vụ</a>
                </div>
                <ul id="dichvu" class="list-unstyled collapse">
                    <li>
                        <a href="#">điều khoản sử dụng</a>
                    </li>
                    <li>
                        <a href="#">chính sách bảo mật thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="#">Giới thiệu Fahasa</a>
                    </li>
                    <li>
                        <a href="#">hệ thống trung tâm - nhà sách</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 footer-column">
                <div class="title">
                    <a href="#hotro" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse"
                       aria-expanded="false">hỗ trợ</a>
                </div>
                <ul id="hotro" class="list-unstyled collapse">
                    <li>
                        <a href="blog-details.html">Chính sách đổi - trả - hoàn tiền</a>
                    </li>
                    <li>
                        <a href="about-us.html">Chính sách bảo hành - bồi hoàn</a>
                    </li>
                    <li>
                        <a href="contact-us.html">Chính sách vận chuyển</a>
                    </li>
                    <li>
                        <a href="my-account.html">Phương thức thanh toán và xuất HĐ</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 footer-column">
                <div class="title">
                    <a href="#account" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse"
                       aria-expanded="false">Tài khoản của tôi</a>
                </div>
                <ul id="account" class="list-unstyled collapse">
                    <li>
                        <a href="blog-details.html">Đăng nhập/Tạo mới tài khoản</a>
                    </li>
                    <li>
                        <a href="#">Thay đổi địa chỉ khách hàng</a>
                    </li>
                    <li>
                        <a href="contact-us.html">chi tiết tài khoản</a>
                    </li>
                    <li>
                        <a href="my-account.html">lịch sử mua hàng</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="footer-bottom-wrap">
        <div class="container">
            <div class="row">
                <div class="footer-copyright text-center py-3">
                    © 2023 - Boostrap theme by store™
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="goToTop" title="Back to top" class="btn-primary"><i
            class="material-icons arrow-up">keyboard_arrow_up</i></a>


</footer>
<!-- Footer -->
<div class="alert text-center cookiealert" role="alert">
    <b>Do you like cookies?</b> We use cookies to ensure you get the best experience on our website. <a
        href="https://demo.templatetrip.com/Html/HTML001_victoria/" rel="noreferrer">learn more</a>

    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
        I agree
    </button>
</div>

<!-- Register modal -->
<form id="registrationForm" action="{{route('registration.post')}}" method="POST">
    @csrf
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-medium text-left">Đăng ký</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-4">
                        <input type="text" id="RegisterForm-fname" class="form-control validate"
                               placeholder="Họ và tên đệm" name="firstName" required>
                    </div>
                    <div class="md-form mb-4">
                        <input type="text" id="RegisterForm-lname" class="form-control validate" placeholder="Tên"
                               name="lastName" required>
                    </div>
                    <div class="md-form mb-4">
                        <input type="text" id="RegisterForm-name" class="form-control validate"
                               placeholder="Tên tài khoản" name="userName" required>
                    </div>
                    <div class="md-form mb-4">
                        <input type="email" id="RegisterForm-email" class="form-control validate"
                               placeholder="Email" name="email" required>
                    </div>
                    <div class="md-form mb-4">
                        <input type="password" id="RegisterForm-pass" class="form-control validate"
                               placeholder="Mật khẩu" name="password" required>
                    </div>
                    <div class="checkbox-link d-flex justify-content-between">
                        <div class="left-col">
                        </div>
                        <div class="right-col"><a href="{{ route('account.identify') }}">Quên mật khẩu?</a></div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Login modal -->
<form id="loginForm" action="{{ route('login.post') }}" method="POST">
    @csrf
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-medium text-left">Đăng nhập</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-4">
                        <input type="email" id="LoginForm-email" class="form-control validate" placeholder="Email"
                               name="email" required>
                    </div>
                    <div class="md-form mb-4">
                        <input type="password" id="LoginForm-pass" class="form-control validate"
                               placeholder="Mật khẩu" name="password" required>
                    </div>
                    <div class="checkbox-link d-flex justify-content-between">
                        <div class="left-col">
                        </div>
                        <div class="right-col"><a href="{{ route('account.identify') }}">Quên mật khẩu?</a></div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- cart-pop modal -->
<div class="modal fade" id="cart-pop" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert-success">
                <h4 class="modal-title w-100w-100w-100">Sản phẩm đã được thêm vào giỏ hàng thành công</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 divide-right">
                        <div class="row">
                            <div class="col-md-5 col-sm-4 col-xs-12 product-img float-left">
                                <img src="/user/assets/img/products/01.jpg" class="img-responsive" alt="01">
                            </div>
                            <div class="col-md-7 col-sm-8 col-xs-12 product-desc float-left">
                                <h4 class="product-title text-capitalize">Burgundy Small Dress</h4>
                                <div class="rating">
                                    <div class="product-ratings d-inline-block align-middle">
                                        <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                        <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                        <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                        <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                        <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                    </div>
                                </div>
                                <h3 class="price float-left w-100"><span
                                        class="regular-price align-middle">$75.00</span> đ<span
                                        class="old-price align-middle">$60.00</span> đ</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 divide-left">
                        <p class="cart-products-count">Có 2 sản phẩm trong giỏ hàng của bạn.</p>
                        <p class="total-products float-left w-100">
                            <strong>Chi phí sản phẩm:</strong> <span class="regular-price">$150.00</span>
                        </p>
                        <p class="shipping float-left w-100">
                            <strong>Chi phí vận chuyển:</strong> 5 đ
                        </p>
                        <div class="cart-content-btn float-left w-100">
                            <form id="reloadForm">
                                <input class="btn pull-right mt_10 btn-primary" value="Tiếp tục mua hàng"
                                       type="submit">
                            </form>
                            <form action="checkout_page.html">
                                <input class="btn pull-right mt_10 btn-secondary" value="Sang trang thanh toán"
                                       type="submit">
                            </form>
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
                            <div class="tab-pane active" id="product-1" role="tabpanel" aria-labelledby="product-tab-1">
                                <div class="single-img img-full">
                                    <a href="/user/assets/img/products/01.jpg" data-image-large data-image-small><img
                                            src="/user/assets/img/products/01.jpg" class="img-fluid" alt=""
                                            width="368" height="478"></a>
                                </div>
                            </div>
                            <!-- Add more image tabs (product-2, product-3, etc.) similarly -->
                        </div>
                        <div class="small-image-list float-left w-100">
                            <div class="nav-add small-image-slider-single-product-tabstyle-3 owl-carousel"
                                 role="tablist" data-small-images>
                                <!-- Small images will be populated here using JavaScript -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 product_content">
                        <h4 class="product-title text-capitalize" data-product-title></h4>
                        <div class="rating">
                            <div class="product-ratings d-inline-block align-middle" data-product-ratings>
                                <!-- Star ratings will be populated here using JavaScript -->
                            </div>
                        </div>
                        <span class="description float-left w-100" data-product-description></span>
                        <h3 class="price float-left w-100">
                            <span class="regular-price align-middle" data-product-selling-price></span>
                            <span class="old-price align-middle" data-product-cost-price></span>
                        </h3>

                        <div class="product-variants float-left w-100">
                            <div class="col-md-4 col-sm-6 col-xs-12 size-options d-flex align-items-center"
                                 data-product-size>
                            </div>
                            <div class="color-option d-flex align-items-center" data-product-cover-style>
                            </div>
                        </div>
                        <div class="btn-cart d-flex align-items-center float-left w-100">
                            <h5>Qty:</h5>
                            <input type="number" value="1" data-product-quantity>
                            <button type="button" class="btn btn-primary" data-add-to-cart>
                                <i class="material-icons">shopping_cart</i> Add To Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Đăng nhập
    $(document).ready(function () {
        $('#loginForm').submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function (response) {
                    if (response.error) {
                        if (response.message === 'Email does not exist') {
                            $('#LoginForm-email + .text-danger').remove();
                            $('#LoginForm-pass + .text-danger').remove();
                            $('#LoginForm-email').after('<div class="text-danger">Email không tồn tại</div>');
                        } else if (response.message === 'Invalid password') {
                            $('#LoginForm-email + .text-danger').remove();
                            $('#LoginForm-pass + .text-danger').remove();
                            $('#LoginForm-pass').after('<div class="text-danger">Mật khẩu sai, kiểm tra lại</div>');
                        } else {
                            console.error(response.message);
                        }
                    } else {
                        window.location.reload();
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });


        // Đăng ký
        $('#registrationForm').submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function (response) {
                    if (response.error) {
                        if (response.message === 'Email existed') {
                            $('#RegisterForm-name + .text-danger').remove();
                            $('#RegisterForm-email + .text-danger').remove();
                            $('#RegisterForm-email').after('<div class="text-danger">Email đã tồn tại</div>');
                        } else if (response.message === 'userName existed') {
                            $('#RegisterForm-name + .text-danger').remove();
                            $('#RegisterForm-email + .text-danger').remove();
                            $('#RegisterForm-name').after('<div class="text-danger">Tên tài khoản đã tồn tại</div>');
                        } else {
                            console.error(response.message);
                        }
                    } else {
                        window.location.reload();
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    });


    // default template
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5ac1aabb4b401e45400e4197/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();

    $(document).ready(function () {
        events.setOnClickBtnQuickView();
    });

    const events = {


        /**
         * Bắt sự kiện cho các nút Xem trước sản phẩm
         */
        setOnClickBtnQuickView() {
            var quickViewButtons = document.querySelectorAll('.btn-quickview');

            quickViewButtons.forEach(function (button) {
                button.addEventListener('click', events.btnQuickViewOnClick);
            });
        },

        /**
         * Bắt sự kiện cho các nút chọn Thể loại (bên dưới Xu hướng mua sắm)
         */
        setOnClickBtnChangeGenre() {
            var btnChangeGenre = document.querySelectorAll('.nav-link.genre-link#featured-tab');
            console.log(btnChangeGenre);

            btnChangeGenre.forEach(function (button) {
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
                        
                        events.setOnClickBtnQuickView();
                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });
            }
        },

        /**
         * Xử lí sự kiện bấm vào nút QuickView
         */
        btnQuickViewOnClick() {
            var productID = this.closest('.product-layouts').querySelector('a').getAttribute('href').split('/')
                .pop();

            console.log(productID);

            fetch('/api/product/' + productID)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    var book = data.products[0];
                    console.log(book);
                    events.showModalProductDetail(book);
                })
                .catch(function (error) {
                    console.log('Error loading product data:', error);
                });
        },


        /**
         * Hiển thị modal chi tiết sản phẩm
         */
        showModalProductDetail(product) {
            // Populate the modal with the product data using data attributes
            document.querySelector("[data-product-title]").textContent = product.BookTitle;

            // Populate star ratings
            var ratingsElement = document.querySelector("[data-product-ratings]");
            ratingsElement.innerHTML = '';
            for (var i = 0; i < product.Rating; i++) {
                var starIcon = document.createElement('span');
                starIcon.classList.add('fa', 'fa-stack');
                starIcon.innerHTML = '<i class="material-icons">star</i>';
                ratingsElement.appendChild(starIcon);
            }

            document.querySelector("[data-product-description]").textContent = product.Description;
            document.querySelector("[data-product-selling-price]").textContent = '$' + product.SellingPrice;
            document.querySelector("[data-product-cost-price]").textContent = product.CostPrice;
            document.querySelector("[data-product-size]").textContent = 'Kích thước: ' + product.Size;
            let coverstyle = '';
            switch (product.CoverStyle) {
                case 0:
                    coverstyle = 'Bìa cứng'
                    break;
                case 1:
                    coverstyle = 'Bìa mềm';
                    break;
            }
            document.querySelector("[data-product-cover-style]").textContent = 'Loại bìa: ' + coverstyle;

            // Update small product images
            var smallImagesContainer = document.querySelector("[data-small-images]");
            smallImagesContainer.innerHTML = '';
            product.SmallImages = ['https://vcdn1-giaitri.vnecdn.net/2023/07/31/Rose-Blackpink-phong-cach.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=sAZoeOeCovvL02RjG8K52Q',
                'https://cdn.tuoitre.vn/thumb_w/640/471584752817336320/2023/2/13/tieu-su-ca-si-rose-blackpink-12-167628252304049682913.jpg'];
            if(product.SmallImages) {
                product.SmallImages.forEach(function (image, index) {
                    var smallImage = document.createElement('div');
                    smallImage.classList.add('single-small-image', 'img-full');
                    var smallImageLink = document.createElement('a');
                    smallImageLink.setAttribute('data-toggle', 'tab');
                    smallImageLink.href = '#product-' + (index + 1);
                    smallImageLink.classList.add('img-fluid');
                    var smallImageElement = document.createElement('img');
                    smallImageElement.setAttribute('src', image);
                    smallImageLink.appendChild(smallImageElement);
                    smallImage.appendChild(smallImageLink);
                    smallImagesContainer.appendChild(smallImage);
                });
            }

            // Handle the Add to Cart button click event
            var addToCartButton = document.querySelector("[data-add-to-cart]");
            var quantityInput = document.querySelector("[data-product-quantity]");
            addToCartButton.addEventListener('click', function () {
                var quantity = parseInt(quantityInput.value);

                alert(quantity);

            });

            console.log(1);
        },


        selectedCheckboxes: [], // Lưu trữ các checkbox đã chọn
        selectedSortValue: '', // Lưu trữ giá trị của dropdown sort
        selectedPerPageValue: '', // Lưu trữ giá trị của dropdown số sản phẩm trên mỗi trang
        currentPage: 1, // Trang hiện tại
        totalPages: 1, // Tổng số trang
        totalItems: 0, // Tổng số sản phẩm
        /**
         * Handle checkbox (trang tìm kiếm)
         */
        handleCheckBox() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const sortSelect = document.getElementById('sort');
            const perPageSelect = document.getElementById('number');
            const prePage = document.getElementById('previous-page-button');
            const nextPage = document.getElementById('next-page-button');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', this.applyFilters.bind(this));
            });

            sortSelect.addEventListener('change', this.applyFilters.bind(this));
            perPageSelect.addEventListener('change', this.applyFilters.bind(this));

            prePage.addEventListener('click', this.handlePreviousPageClick.bind(this));
            nextPage.addEventListener('click', this.handleNextPageClick.bind(this));
        },
        applyFilters() {
            this.selectedCheckboxes = Array.from(document.querySelectorAll('input[type="checkbox"]'))
                .filter(checkbox => checkbox.checked)
                .map(checkbox => ({ id: checkbox.id.toString(), name: checkbox.name.trim() }));

            this.selectedSortValue = document.getElementById('sort').value;
            this.selectedPerPageValue = document.getElementById('number').value;

            // Gọi hàm fetchApiData với trang hiện tại
            this.fetchApiData(this.currentPage);

        },

        fetchApiData(page){
            fetch('/api/product/searchByFilter', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({checkboxes: this.selectedCheckboxes, sort: this.selectedSortValue, perPage: this.selectedPerPageValue, page: page})

            })
                .then(response => response.json())
                .then(data => {
                    this.totalItems = data.totalItems;
                    this.totalPages = data.totalPages;
                    console.log(this.totalPages);
                    events.updateUIWithData(data.results.data);
                    events.setOnClickBtnQuickView();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },

        updateUIWithData(books){
            console.log(books);
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
        },
        // Bắt sự kiện click cho nút "Previous Page"
        handlePreviousPageClick() {

                if (this.currentPage > 1) {
                    this.currentPage--;
                    this.fetchApiData(this.currentPage);
                }
        },

        // Bắt sự kiện click cho nút "Next Page"
        handleNextPageClick() {
                if (this.currentPage < this.totalPages) {
                    this.currentPage++;
                    this.fetchApiData(this.currentPage);
                }
        }
    };



    // Lấy tất cả các checkboxes trong group1
    // Lấy tất cả các nhóm checkboxes
    const checkboxGroups = document.querySelectorAll('input[type="checkbox"][name^="group"]');

    // Gán sự kiện change cho từng nhóm checkboxes
    checkboxGroups.forEach(group => {
        group.addEventListener('change', function () {
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


    $(document).ready(function () {
        $('.btn-cart').on('click', function () {
            var bookName = $(this).data('book-name');
            var bookPrice = $(this).data('book-price');
            $('#cart-pop .product-title').text(bookName);
            $('#cart-pop .regular-price').text(bookPrice);
        });
    });

    document.getElementById('reloadForm').addEventListener('submit', function(event) {
        event.preventDefault();
        location.reload(); 
    });

</script>
