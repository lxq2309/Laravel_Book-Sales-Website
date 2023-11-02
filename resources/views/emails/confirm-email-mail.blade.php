<!DOCTYPE html>
<html lang="en">
<head>
    <title>DemoMail</title>
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
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-4">
                    <div class="card-body border p-4">
                        <h1 class="card-title">{{ $mailData['title'] }}</h1>
                        <p class="card-text">{{ $mailData['body'] }} <strong>{{ $mailData['confirmationCode'] }}</strong></p>
                        <p class="card-text">Đây là tin nhắn để test thử cơ chế send mail cho web CNPM</p>
                        <p class="card-text">Cảm ơn đã đọc</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>