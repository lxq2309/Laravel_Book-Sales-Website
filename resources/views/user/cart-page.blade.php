@extends('user.layout.layout')

@section('content')
	
<nav aria-label="breadcrumb" class="w-100 float-left">
    <ol class="breadcrumb parallax justify-content-center" data-source-url="/user/assets/img/banner/parallax.jpg" style="background-image: url(&quot;/user/assets/img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cart Page</li>
    </ol>
</nav>
<div class="cart-area table-area pt-110 pb-95 float-left w-100">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12 col-sm-12 float-left cart-wrapper">
                <div class="table-responsive">
                    <table class="table product-table text-center">
                        <thead>
                            <tr>
                                <th class="table-remove text-capitalize">Xóa</th>
                                <th class="table-image text-capitalize">Ảnh</th>
                                <th class="table-p-name text-capitalize">Tên sách</th>
                                <th class="table-p-price text-capitalize">Giá</th>
                                <th class="table-p-qty text-capitalize">Số lượng</th>
                                <th class="table-total text-capitalize">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-remove"><button><i class="material-icons">delete</i></button></td>
                                <td class="table-image"><a href="product-details.html"><img src="/user/assets/img/products/02.jpg" alt=""></a></td>
                                <td class="table-p-name text-capitalize"><a href="product-details.html">aspetur autodit autfugit</a></td>
                                <td class="table-p-price"><p>$100.00</p></td>
                                <td class="table-p-qty"><input value="1" name="cart-qty" type="number"></td>
                                <td class="table-total"><p>$100.00</p></td>
                            </tr>
                            <tr>
                                <td class="table-remove"><button><i class="material-icons">delete</i></button></td>
                                <td class="table-image"><a href="product-details.html"><img src="/user/assets/img/products/03.jpg" alt=""></a></td>
                                <td class="table-p-name text-capitalize"><a href="product-details.html">magni dolores eosquies</a></td>
                                <td class="table-p-price"><p>$100.00</p></td>
                                <td class="table-p-qty"><input value="1" name="cart-qty" type="number"></td>
                                <td class="table-total"><p>$100.00</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-bottom-wrapper">
                    <div class="table-coupon d-flex d-xs-block d-lg-flex d-sm-flex fix justify-content-start float-left">
                        <input type="text" placeholder="Nhập mã khuyến mại">
                        <button type="submit" class="btn-primary btn">Áp dụng khuyến mại</button>
                    </div>
                    <div class="table-update d-flex d-xs-block d-lg-flex d-sm-flex justify-content-end">
                        <button type="button" class="btn-primary btn">Cập nhật giỏ hàng
                    </div>
                </div>
			</div>
			<div class="table-total-wrapper d-flex justify-content-end pt-60 col-md-12 col-sm-12 col-lg-4 float-left  align-items-center">
                <div class="table-total-content">
                    <h2 class="pb-20">Tổng giỏ hàng</h2>
                    <div class="table-total-amount">
                        <div class="single-total-content d-flex justify-content-between float-left w-100">
                            <strong>Giá sản phẩm</strong>
                            <span class="c-total-price">$160.00</span>
                        </div>
                        <div class="single-total-content d-flex justify-content-between float-left w-100">
                            <strong>Chi phí vận chuyển</strong>
                            <span class="c-total-price">$5.00</span>
                        </div>
                        <div class="single-total-content tt-total d-flex justify-content-between float-left w-100">
                            <strong>Tổng chi phí</strong>
                            <span class="c-total-price">$165.00</span>
                        </div>
                        <a href="checkout_page.html" class="btn btn-primary float-left w-100 text-center">Chuyển đến trang thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>     
</div>

@endsection