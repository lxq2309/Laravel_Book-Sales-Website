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
                        enim vitae</div>
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
<form id="registrationForm"action="{{route('registration.post')}}" method="POST">
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
                        <input type="text" id="RegisterForm-fname" class="form-control validate" placeholder="Họ và tên đệm" name="firstName" required>
                    </div>
                    <div class="md-form mb-4">
                        <input type="text" id="RegisterForm-lname" class="form-control validate" placeholder="Tên" name="lastName" required>
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
<!-- cart-pop modal -->
<div class="modal fade" id="cart-pop" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert-success">
                <h4 class="modal-title w-100w-100w-100">Product successfully added to your shopping cart</h4>
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
                                        class="regular-price align-middle">$75.00</span><span
                                        class="old-price align-middle">$60.00</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 divide-left">
                        <p class="cart-products-count">There are 2 items in your cart.</p>
                        <p class="total-products float-left w-100">
                            <strong>Total products:</strong> $150.00
                        </p>
                        <p class="shipping float-left w-100">
                            <strong>Total shipping:</strong> free
                        </p>
                        <p class="total-price float-left w-100">
                            <strong>Total:</strong> $150.00(tax incl.)
                        </p>
                        <div class="cart-content-btn float-left w-100">
                            <form action="#">
                                <input class="btn pull-right mt_10 btn-primary" value="Continue shopping"
                                       type="submit">
                            </form>
                            <form action="checkout_page.html">
                                <input class="btn pull-right mt_10 btn-secondary" value="Proceed to checkout"
                                       type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#loginForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
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
                error: function(error) {
                    console.error(error);
                }
            });
        });

        $('#registrationForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
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
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });



</script>
