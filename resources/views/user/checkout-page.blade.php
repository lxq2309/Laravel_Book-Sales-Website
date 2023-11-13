@extends('user.layout.layout')

@section('content')

    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="/user/assets/img/banner/parallax.jpg"
            style="background-image: url(&quot;/user/assets/img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout Page</li>
        </ol>
    </nav>

    </ol>
    </nav>
    <div class="checkout-inner float-left w-100">
        <div class="container">
            <div class="row">
                <div class="cart-block-left col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span>Giỏ hàng của bạn</span>
                    </h4>
                    <div class="list-group mb-3">
                        <div class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Giá sản phẩm</h6>
                            </div>
                            <span class="text-muted">{{ $bookPrice }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Chi phí vận chuyển</h6>
                            </div>
                            <span class="text-muted">5 đ</span>
                        </div>
                        @if($couponCode)
                            <div class="list-group-item d-flex justify-content-between">
                                <div class="text-success">
                                    <h6 class="my-0">Mã khuyến mại</h6>
                                </div>
                                <span class="text-success">{{$discount}}</span>
                            </div>
                        @endif
                        <div class="list-group-item d-flex justify-content-between">
                            @php
                            $totalPrice = !empty($totalPriceDiscount) ? $totalPriceDiscount : $totalPrice;
                            @endphp
                            <strong>Total (VND)</strong>
                            <strong>{{ $totalPrice  }}</strong>
                        </div>
                        @if($shippingAddressList->count() > 0)
                        <a href="{{ Route('checkout.confirm', ['shippingAddress' => '']) }}"
                            class="btn btn-primary btn-lg btn-primary"
                            id="checkout-submit">
                            Đặt đơn
                        </a>
                        @else
                        <div style="color: red; font-weight: bold; justify-content:center">Hãy Thêm Địa Chỉ Giao Hàng Để Đặt Đơn</div>
                        @endif
                        </ul>

                        <!--<form class="card p-2">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Promo code">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary btn-primary">Redeem</button>
                          </div>
                        </div>
                        </form>-->
                    </div>
                </div>
                <div class="cart-block-right col-md-8 order-md-1">
                    <h4 class="mb-3">Thông tin giao hàng</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Họ và tên đệm <span class="required">*</span></label>
                                <input type="text" class="form-control" id="firstName" placeholder="Họ và tên đệm"
                                       value="{{ Session::get('user')->FirstName }}" required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Tên<span class="required">*</span></label>
                                <input type="text" class="form-control" id="lastName" placeholder="Tên"
                                       value="{{ Session::get('user')->LastName }}" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username">Tên tài khoản</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="username" placeholder="Tên tài khoản"
                                       value="{{ Session::get('user')->UserName }}" required="" disabled>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email </label>
                            <input type="email" class="form-control" id="email"
                                   value="{{ Session::get('user')->email }}" disabled>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Địa chỉ giao hàng<span class="required">*</span> </label>
                            <select name="addressList" id="addressList" class="form-control" id="address"
                                    required="">
                                @if($shippingAddressList)
                                    @foreach($shippingAddressList as $shippingAddres)
                                        <option name="shippingAddress" value="{{$shippingAddres->Address}}">{{$shippingAddres->Address}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Bắt sự kiện khi thay đổi giá trị trong thẻ select
        $('#addressList').on('change', function () {
            // Lấy giá trị của option được chọn
            var selectedAddress = $(this).val();

            // Hiển thị giá trị của option lên input
            $('#address').val(selectedAddress);
        });

        $(document).ready(function () {
            function updateCheckoutLink(selectedAddress) {
                var couponCode = "{{ $couponCode }}";
                var checkoutLink = "{{ route('checkout.confirm', ['shippingAddress' => '']) }}&couponCode=" + couponCode;
                checkoutLink = checkoutLink.replace('shippingAddress=', 'shippingAddress=' + encodeURIComponent(selectedAddress));
                $('#checkout-submit').attr('href', checkoutLink);
            }

            // Initial setup with default address
            var defaultSelectedAddress = $('#addressList').val();
            updateCheckoutLink(defaultSelectedAddress);

            // Listen for the change event on the select element
            $('#addressList').change(function () {
                var selectedAddress = $(this).val();
                updateCheckoutLink(selectedAddress);
            });
        });

    </script>
@endsection
