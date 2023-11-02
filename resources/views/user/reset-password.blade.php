<!DOCTYPE html>
<html>
<head>
    <title>Đổi mật khẩu thôi</title>
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
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background-color: #f5f5f5;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bold"><strong>Thay đổi mật khẩu</strong></div>
                    <div class="card-body">
                        <p class="text-center">Nhập mã định danh được gửi tới Email bạn và mật khẩu mới</p>
                        <form action="{{ route('change.password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="email" value="{{ $mailData['email'] }}">
                            <div class="form-group">
                                <label for="confirmCode" class="sr-only">Mã định danh</label>
                                <input id="confirmCode" type="text" class="form-control" name="confirmCode" required autofocus placeholder="Nhập Mã Định Danh">
                            </div>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('errorCode') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required autofocus placeholder="Nhập Mật Khẩu Mới">
                            </div>
                            <div class="form-group">
                                <label for="cfpassword" class="sr-only">CfPassword</label>
                                <input id="cfpassword" type="password" class="form-control" name="cfpassword" required autofocus placeholder="Nhập Lại Mật Khẩu Mới">
                            </div>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('errorPass') }}
                                </div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="window.history.back();">
                                    Hủy
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Xác nhận
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
