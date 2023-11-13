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
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
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
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td class="table-remove">
                                        <button>
                                            <a class="close-cart" data-bookid="{{ $item->book?->BookID }}">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </button>
                                    </td>
                                    <td class="table-image"><a href="product-details.html"><img src="{{ $item->book?->Avatar }}" alt="{{ $item->book?->BookTitle }}"></a></td>
                                    <td class="table-p-name text-capitalize"><a href="product-details.html">{{ $item->book?->BookTitle }}</a></td>
                                    <td class="table-p-price"><p>{{ $item->book?->CostPrice }} đ</p></td>
                                    <td class="table-p-qty"><input value="{{ $item->Quantity }}" name="cart-qty[{{ $item->CartItemID }}]" value="{{ $item->Quantity }}" type="number"></td>
                                    <td class="table-total"><p>{{ $item->book?->CostPrice * $item->Quantity }} đ</p></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($cartItems && count($cartItems) > 0)
                    <div class="table-update d-flex d-xs-block d-lg-flex d-sm-flex">
                        <button type="submit" class="btn-primary btn">Cập nhật giỏ hàng</button>
                    </div>
                    <div class="table-bottom-wrapper">
                        <div class="table-coupon d-flex d-xs-block d-lg-flex d-sm-flex fix justify-content-start float-left">
                            <input type="text" id="couponCode" placeholder="Nhập mã khuyến mại">
                            <button type="button" class="btn-primary btn" id="couponApply">Áp dụng khuyến mại</button>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
			<div class="table-total-wrapper d-flex justify-content-end pt-60 col-md-12 col-sm-12 col-lg-4 float-left  align-items-center">
                <div class="table-total-content">
                    <h2 class="pb-20">Tổng giỏ hàng</h2>
                    <div class="table-total-amount">
                        <div class="single-total-content d-flex justify-content-between float-left w-100">
                            <strong>Giá sản phẩm</strong>{{$bookPrice}} đ</span>
                        </div>
                        <div class="single-total-content d-flex justify-content-between float-left w-100">
                            <strong>Chi phí vận chuyển</strong>
                            <span class="c-total-price">{{$shipPrice}} đ</span>
                        </div>

                            <div class=" single-total-content justify-content-between float-left w-100" style="display: none" id="showDiscount">
                                <strong>Giảm</strong>
                                <span class="c-total-price" id="costCoupon"></span>
                            </div>

                        <div class="single-total-content tt-total d-flex justify-content-between float-left w-100">
                            <strong>Tổng chi phí</strong>
                            <span class="c-total-price" id="totalPrice">{{$totalPrice}} đ</span>
                        </div>

                        @if ($cartItems && count($cartItems) > 0)
                            <form action="{{ route('checkout.page') }}" method="GET">
                                <input type="hidden" name="couponCode">
                                <button type="submit" class="btn btn-primary float-left w-100 text-center">Chuyển đến trang thanh toán</button>
                            </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function updateTotalBookCount(count) {
        $('.ttcount').text(count);
    }

    $(document).ready(function () {
        $(".close-cart").click(function () {
            var bookID = $(this).data('bookid');


            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            var currentRow = $(this).closest('tr');

            $.ajax({
                url: '/cart/remove',
                method: 'POST',
                data: { book_id: bookID},
                success: function (response) {
                    // Handle success, such as updating the cart display or removing the row from the table.
                    console.log(response.message);
                    currentRow.remove();
                    updateTotalBookCount(response.totalBookCount);
                },
                error: function (error) {
                    // Handle errors, if any.
                    console.error('Error:', error);
                }
            });
        });

        applyCoupon();
    });

    function applyCoupon() {

        var totalPriceElement = document.getElementById('totalPrice');
        var totalPriceText = $('#totalPrice').text()
        var totalPrice = totalPriceText.replace('đ', '').trim();
        var costCoupon = document.getElementById('costCoupon');


        $('#couponApply').on('click', function() {

            var data = {
                couponCode: $('#couponCode').val(),
                totalPrice: totalPrice
            }

            console.log(data);

            fetch('/api/cart/coupon', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(response => {
                    console.log(response)
                    if(response.status === 200){
                        totalPriceElement.textContent = response.totalPrice + ' ' + 'đ';
                        document.getElementById('showDiscount').style.display = 'flex';
                        costCoupon.textContent = response.discount + ' ' + 'đ';
                        document.getElementsByName('couponCode')[0].value = document.getElementById('couponCode').value;
                        alert(response.message);
                    }
                    if(response.status === 400){

                        alert(response.message);
                    }
                    if(response.status === 404){

                        alert(response.message);
                    }

                })
                .catch(error => {
                    // Xử lý lỗi nếu có
                    console.error('Error:', error);
                });
        });
    }
</script>
@endsection
