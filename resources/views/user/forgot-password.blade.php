<!DOCTYPE html>
<html>
<head>
<head>
        <title>Quên pass rồi bạn ơi</title>
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
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background-color: #f5f5f5;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bold">Tìm kiếm tài khoản</div>
                    <div class="card-body">
                        <p class="text-center">Vui lòng nhập email để tìm kiếm tài khoản của bạn..</p>
                        <form action="{{ route('email.identify') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required autofocus placeholder="Nhập Email">
                            </div>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
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
