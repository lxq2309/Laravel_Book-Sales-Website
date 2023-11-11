<!doctype html>
<html lang="en">

<head>
    <title>Website bán sách nhé các bạn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Demo powered by Templatetrip">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,900" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="/user/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/user/assets/css/styles.css" rel="stylesheet">
    <link href="/user/assets/css/animate.css" rel="stylesheet">
    <link href="/user/assets/css/owl-carousel.css" rel="stylesheet">
    <link href="/user/assets/css/lightbox.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="index layout1">

    @include('user.layout.header')

    @yield('content')

    @include('user.layout.footer')


    <div class="compare-wrapper float-left w-100">
        <div class="compare-inner d-flex align-items-center p-20">
            <span class="close"><i class='material-icons'>
                    close
                </i></span>
            <div class="col-xs-12 col-sm-2 col-md-3 float-left d-flex align-items-center flex-column compare-left">
                <h2>compare products</h2>
                <div class="compare-btn">show all</div>
            </div>
            <div class="col-xs-12 col-sm-10 col-md-9 d-flex float-left align-items-center compare-right">
                <div class="compare-close-btn"></div>
                <div class="compare-products d-flex col-sm-7 col-lg-5">
                    <div class="row">
                        <div class="single-item col-sm-4 col-xs-4">
                            <div class="remove"></div>
                            <div class="image"><img src="/user/assets/img/products/01.jpg" class="img-fluid"
                                    alt=""></div>
                        </div>
                        <div class="single-item col-sm-4 col-xs-4">
                            <div class="remove"></div>
                            <div class="image"><img src="/user/assets/img/products/02.jpg" class="img-fluid"
                                    alt=""></div>
                        </div>
                        <div class="single-item col-sm-4 col-xs-4">
                            <div class="remove"></div>
                            <div class="image"><img src="/user/assets/img/products/03.jpg" class="img-fluid"
                                    alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="buttons col-sm-5 col-lg-2">
                    <a href="compare.html" class="compare-btn btn btn-secondary float-left w-100 mb-15">compare</a>
                    <div class="clear-btn btn btn-primary float-left w-100">clear</div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/user/assets/js/jquery.min.js"></script>
    <script src="/user/assets/js/bootstrap.min.js"></script>
    <script src="/user/assets/js/owl.carousel.min.js"></script>
    <script src="/user/assets/js/custom.js"></script>
    <script src="/user/assets/js/parallax.js"></script>
    <script src="/user/assets/js/lightbox-2.6.min.js"></script>
    <script src="/user/assets/js/ResizeSensor.min.js"></script>
    <script src="/user/assets/js/theia-sticky-sidebar.min.js"></script>
    <script src="/user/assets/js/inview.js"></script>
    <script src="/user/assets/js/cookiealert.js"></script>
    <script src="/user/assets/js/jquery.countdown.min.js"></script>
    <script src="/user/assets/js/masonry.pkgd.min.js"></script>
    <script src="/user/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/user/assets/js/jquery.zoom.min.js"></script>
    <script src="/user/assets/js/jquery.lazy.min.js"></script>
    @yield('scripts')
</body>
@yield('styleProductDetail')

</html>
