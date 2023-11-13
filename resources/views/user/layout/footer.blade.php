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
    <div class="modal-dialog text-center" style="width: 600px">
        <div class="modal-content">
            <div class="modal-header alert-success">
                <h4 class="modal-title w-100w-100w-100">Sản phẩm đã được thêm vào giỏ hàng thành công</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <form id="reloadForm">
                                <div class="col-md-12">
                                    <input class="btn pull-left btn-primary" value="Tiếp tục mua hàng" type="submit">
                                </div>
                            </form>
                            <form method="GET" action="{{ route('cart.page') }}">
                                <div class="col-md-12">
                                    <input class="btn pull-right btn-primary"
                                    value="Xem giỏ" type="submit">
                                </div>
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
                                 role="tablist" data-small-image>

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
                            <div class="col-md-6 col-sm-6 col-xs-12 size-options d-flex align-items-center"
                                 data-product-author>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 size-options d-flex align-items-center"
                                 data-product-year-published>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 size-options d-flex align-items-center"
                                 data-product-size>
                            </div>
                            <div class="color-option d-flex align-items-center" data-product-cover-style>
                            </div>
                        </div>
                        <div class="btn-cart d-flex align-items-center float-left w-100">
                            <h5>Qty:</h5>
                            <input type="number" value="1" data-product-quantity>
                            <button type="button" class="btn btn-primary" data-target="#cart-pop" data-toggle="modal"
                                    data-add-to-cart>
                                <i class="material-icons">shopping_cart</i> Thêm vào giỏ hàng
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
         * Bắt sự kiện cho các nút bên dưới danh mục sản phẩm (HOME)
         */
        setOnClickBtnChangeGetAllCondition() {
            let btnChange = document.querySelectorAll('.nav-link.genre-link#featured-tab');

            btnChange.forEach(function (button) {
                button.addEventListener('click', events.btnChangeGetAllConditionOnClick);
            });
        },
        /**
         * Xử lí sự kiện chọn điều kiện cho việc lấy tất cả sách
         */
        btnChangeGetAllConditionOnClick() {
            if (this.classList.contains('genre-link')) {
                let conditional = this.getAttribute('data-conditional-id');

                Paginate.currentPage = 1;
                Paginate.conditional = conditional;
                getAllProductWith(conditional, Paginate.currentPage);
            }
        },

        /**
         * Xử lí sự kiện bấm vào nút QuickView
         */
        btnQuickViewOnClick() {
            var productID = this.closest('.product-layouts').querySelector('a').getAttribute('href').split('/')
                .pop();

            fetch('/api/product/' + productID)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    let book = data.products;
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
            console.log(product);

            strImg = `<div class="single-img img-full">
                                    <a href="${product.Avatar}" data-image-large data-image-small><img
                                            src="${product.Avatar}" class="img-fluid" alt=""
                                            width="368" height="478"></a>
                                </div>`;
            document.getElementById('product-1').innerHTML = strImg;

            // Populate the modal with the product data using data attributes
            document.querySelector("[data-product-title]").textContent = product.BookTitle;

            // Populate star ratings
            var ratingsElement = document.querySelector("[data-product-ratings]");
            ratingsElement.innerHTML = '';
            for (var i = 0; i < product.AVGRating; i++) {
                var starIcon = document.createElement('span');
                starIcon.classList.add('fa', 'fa-stack');
                starIcon.innerHTML = '<i class="material-icons">star</i>';
                ratingsElement.appendChild(starIcon);
            }
            for (var i = product.AVGRating; i < 5; i++) {
                var starIcon = document.createElement('span');
                starIcon.classList.add('fa', 'fa-stack');
                starIcon.innerHTML = '<i class="material-icons off">star</i>';
                ratingsElement.appendChild(starIcon);
            }

            document.querySelector("[data-product-description]").textContent = product.Description;
            document.querySelector("[data-product-selling-price]").textContent = '$' + product.SellingPrice;
            document.querySelector("[data-product-cost-price]").textContent = product.CostPrice;
            document.querySelector("[data-product-size]").textContent = 'Kích thước: ' + product.Size;
            document.querySelector("[data-product-author]").textContent = 'Tác giả: ' + product.Author;
            document.querySelector("[data-product-year-published]").textContent = 'Năm xuất bản: ' + product.YearPublished;
            document.querySelector("#product_view .btn-cart").setAttribute('data-book-id', product.BookID);
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


            // Handle the Add to Cart button click event
            var addToCartButton = document.querySelector("[data-add-to-cart]");
            var quantityInput = document.querySelector("[data-product-quantity]");
            addToCartButton.addEventListener('click', function () {
                $('#product_view').modal('hide');
            });
        },


        selectedCheckboxes: [], // Lưu trữ các checkbox đã chọn
        selectedSortValue: '', // Lưu trữ giá trị của dropdown sort
        selectedPerPageValue: '', // Lưu trữ giá trị của dropdown số sản phẩm trên mỗi trang
        currentPage: 1, // Trang hiện tại
        totalPages: 1, // Tổng số trang
        totalItems: 0, // Tổng số sản phẩm
        textSearch: '',
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
                .map(checkbox => ({id: checkbox.id.toString(), name: checkbox.name.trim()}));

            this.selectedSortValue = document.getElementById('sort').value;
            this.selectedPerPageValue = document.getElementById('number').value;
            var elementExists = $('h5').length > 0;
            if (elementExists) {
                textSearch = $('h5').data('textsearch');
            } else {
                textSearch = '';
            }
            // Gọi hàm fetchApiData với trang hiện tại
            this.fetchApiData(this.currentPage);

        },

        fetchApiData(page) {
            fetch('/api/product/searchByFilter', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    checkboxes: this.selectedCheckboxes,
                    sort: this.selectedSortValue,
                    perPage: this.selectedPerPageValue,
                    page: page,
                    textSearch: this.textSearch
                })

            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    this.totalItems = data.totalItems;
                    this.totalPages = data.totalPages;
                    events.updateUIWithData(data.results);
                    events.setOnClickBtnQuickView();

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },

        updateUIWithData(books) {

            var proFilHTML1 = books.data.map(book => renderProductSight1(book)).join('');
            var proFilHTML2 = books.data.map(book => renderProductSight2(book)).join('');
            var proFilHTML3 = books.data.map(book => renderProductSight3(book)).join('');
            document.querySelector('.showProFilter1').innerHTML = proFilHTML1;
            document.querySelector('.showProFilter2').innerHTML = proFilHTML2;
            document.querySelector('.showProFilter3').innerHTML = proFilHTML3;
            document.querySelector("#pagination-left-text").innerHTML = `Hiển thị ${books.from} đến ${books.to} trong tổng số ${books.total} bản ghi (Trang ${books.current_page})`;

            setBtnAddToCartOnClick();
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
            var bookOldPrice = $(this).data('book-oldPrice');
            $('#cart-pop .product-title').text(bookName);
            $('#cart-pop .regular-price').text(bookPrice);
            $('#cart-pop .old-price').text(bookOldPrice);
        });
    });

    document.getElementById('reloadForm').addEventListener('submit', function (event) {
        event.preventDefault();
        location.reload();
    });

    function renderProductSight3(product) {
        let starRatingHTML = '';
        let star = product.AVGRating >= 5 ? 5 : product.AVGRating;
        for (let i = 0; i < star; i++) {
            starRatingHTML += `<span class="fa fa-stack"><i class="material-icons">star</i></span>`;
        }
        for (let i = star; i < 5; i++) {
            starRatingHTML += `<span class="fa fa-stack"><i class="material-icons off">star</i></span>`;
        }
        return `<div class="product-layouts">
                                <div class="product-thumb row">
                                    <div class="image zoom col-xs-12 col-sm-3 col-md-2">
                                        <a href="/product-detail/${product.BookID}" class="d-block position-relative">
                                            <img src="${product.Avatar}" alt="01" />
                                            <img src="${product.Avatar}" alt="02"
                                                 class="second_image img-responsive" /> </a>
                                    </div>
                                    <div class="thumb-description col-xs-12 col-sm-9 col-md-10 position-static text-left">
                                        <div class="sort-title col-md-5 col-sm-7 float-left">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="/product-detail/${product.BookID}">${product.BookTitle}</a></h4>
                                            </div>

                                            <div class="rating mb-10">
                                                <div class="product-ratings d-inline-block align-middle">
                                                    ${starRatingHTML}
                                                </div>
                                            </div>
                                            <div class="description mb-10">
                                                ${product.Description} </div>
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
                                                <div class="regular-price">${product.SellingPrice}</div>
                                                <div class="old-price">${product.CostPrice}</div>
                                            </div>
                                        </div>
                                        <div
                                            class="button-wrapper col-md-4 col-sm-5 float-left text-center text-md-center text-sm-center text-xs-left">
                                            <div class="button-group text-center">
                                                <button type="button" class="btn btn-primary btn-cart"
                                                        data-target="#cart-pop" data-toggle="modal" data-book-id="${product.BookID}"><i
                                                        class="material-icons">shopping_cart</i><span>out of
                                                        stock</span></button>
                                                <a href="#" class="btn btn-primary btn-wishlist"><i
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
                            </div>`;
    }

    function renderProductSight2(product) {
        let starRatingHTML = '';
        let star = product.AVGRating >= 5 ? 5 : product.AVGRating;
        for (let i = 0; i < star; i++) {
            starRatingHTML += `<span class="fa fa-stack"><i class="material-icons">star</i></span>`;
        }
        for (let i = star; i < 5; i++) {
            starRatingHTML += `<span class="fa fa-stack"><i class="material-icons off">star</i></span>`;
        }
        return `<div class="product-layouts">
                                <div class="product-thumb row">
                                    <div class="image zoom col-xs-12 col-sm-5 col-md-4">
                                        <a href="/product-detail/${product.BookID}" class="d-block position-relative">
                                            <img src="${product.Avatar}" alt="01" />
                                            <img src="${product.Avatar}" alt="02"
                                                 class="second_image img-responsive" />
                                        </a>

                                    </div>
                                    <div class="thumb-description col-xs-12 col-sm-7 col-md-8 position-static text-left">
                                        <div class="caption">
                                            <h4 class="product-title text-capitalize"><a
                                                    href="/product-detail/${product.BookID}">${product.BookTitle}</a></h4>
                                        </div>
                                        <div class="rating mb-10">
                                            <div class="product-ratings d-inline-block align-middle">
                                                ${starRatingHTML}
                                            </div>
                                        </div>

                                        <div class="description">
                                            ${product.Description} </div>

                                        <div class="price">
                                            <div class="regular-price">${product.SellingPrice}</div>
                                            <div class="old-price">${product.CostPrice}</div>
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
                                                        data-target="#cart-pop" data-toggle="modal" data-book-id="${product.BookID}"><i
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
                            </div>`;
    }

    function renderProductSight1(product) {
        let starRatingHTML = '';
        let star = product.AVGRating >= 5 ? 5 : product.AVGRating;
        for (let i = 0; i < star; i++) {
            starRatingHTML += `<span class="fa fa-stack"><i class="material-icons">star</i></span>`;
        }
        for (let i = star; i < 5; i++) {
            starRatingHTML += `<span class="fa fa-stack"><i class="material-icons off">star</i></span>`;
        }
        return `<div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="product-thumb">
                                        <div class="image zoom">
                                            <a href="/product-detail/${product.BookID}">
                                                <img src="${product.Avatar}" alt="01" />
                                                <img src="${product.Avatar}" alt="02"
                                                    class="second_image img-responsive" /> </a>
                                        </div>
                                        <div class="thumb-description">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="/product-detail/${product.BookID}">${product.BookTitle}</a></h4>
                                            </div>
                                            <div class="rating">
                                                <div class="product-ratings d-inline-block align-middle">
                                                    ${starRatingHTML}
                                                </div>
                                            </div>

                                            <div class="price">
                                                <div class="regular-price">${product.SellingPrice}</div>
                                                <div class="old-price">${product.CostPrice}</div>
                                            </div>
                                            <div class="button-wrapper">
                                                <div class="button-group text-center">
                                                    <button type="button" class="btn btn-primary btn-cart"
                                                        data-target="#cart-pop" data-toggle="modal" data-book-id="${product.BookID}"><i
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
                                </div>`;
    }

    function renderProduct(product) {
        let starRatingHTML = '';
        let star = product.AVGRating >= 5 ? 5 : product.AVGRating;
        for (let i = 0; i < star; i++) {
            starRatingHTML += `<span class="fa fa-stack"><i class="material-icons">star</i></span>`;
        }
        for (let i = star; i < 5; i++) {
            starRatingHTML += `<span class="fa fa-stack"><i class="material-icons off">star</i></span>`;
        }
        return `
                <div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
												<div class="product-thumb">
													<div class="image zoom">
														<a href="/product-detail/${product.BookID}">
														<img src="${product.Avatar}" alt="01" height="501" width="385"/>
														<img src="${product.Avatar}" alt="02" class="second_image img-responsive" height="501" width="385"/>										</a>
													</div>
													<div class="thumb-description">
														<div class="caption">
															<h4 class="product-title text-capitalize"><a href="/product-detail/${product.BookID}">${product.BookTitle}</a></h4>
														</div>
														<div class="rating">
														<div class="product-ratings d-inline-block align-middle">
															${starRatingHTML}										</div>
														</div>
														<div class="price">
															<div class="regular-price">${product.SellingPrice}</div>
															<div class="old-price">${product.CostPrice}</div>
														</div>
														<div class="button-wrapper">
														<div class="button-group text-center">
															<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal" data-book-id="${product.BookID}"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
															<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
															<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
															<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view"><i class="material-icons">visibility</i><span>Quick View</span></button>
														</div>
														</div>
													</div>
												</div>
                                             </div>
            `;
    }

    function getAllProductWith(conditional, page) {
        console.log(conditional);
        fetch(`/api/product/all/${conditional}?page=${page}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                let paginate = data.products;
                Paginate.lastPage = paginate.last_page;
                var products = paginate.data;
                var productsHTML = products.map(product => renderProduct(product)).join('');

                document.querySelector(".displayProducts").innerHTML = productsHTML;

                events.setOnClickBtnQuickView();
                setBtnAddToCartOnClick();

                document.querySelector("#pagination-left-text").innerHTML = `Hiển thị ${paginate.from} đến ${paginate.to} trong tổng số ${paginate.total} bản ghi (Trang ${paginate.current_page})`;
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }

    function setBtnAddToCartOnClick() {
        // Duyệt qua mỗi phần tử có class là '.btn-cart'
        $('.btn-cart').each(function () {
            // Kiểm tra xem phần tử đã có sự kiện click chưa
            if (!$._data(this, 'events') || !$._data(this, 'events').click) {
                // Gán sự kiện click nếu chưa có
                $(this).click(function () {
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
            }
        });
    }


</script>
