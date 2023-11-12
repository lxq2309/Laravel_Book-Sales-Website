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
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <h2>Order Details</h2>

    <p><strong>Order ID:</strong> {{ $mailData['orderID'] }}</p>

    <h3>Sản phẩm đặt</h3>
    <ul>
        @foreach ($mailData['cartItem'] as $cartItem)
            <li style="list-style:decimal;">
                <div class="col-sm-1 col-xs-3 float-left">
                    <img src="{{ $cartItem->book->Avatar }}" alt="" style="width: 200px;">
                </div>
                Tên sách: <strong>{{ $cartItem->book->BookTitle }}</strong>
                <br>
                Số lượng: {{ $cartItem->Quantity }}
                <br>
                Giá: ${{ $cartItem->Quantity * $cartItem->book->CostPrice }}
            </li>
        @endforeach
    </ul>

    <p><strong>Total Price:</strong> ${{ $mailData['totalPrice'] }}</p>
</body>
</html>