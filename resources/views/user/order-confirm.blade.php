@extends('user.layout.layout')

@section('content')
<nav aria-label="breadcrumb" class="w-100 float-left">
  <ol class="breadcrumb parallax justify-content-center" data-source-url="/user/assets/img/banner/parallax.jpg" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
    <li class="breadcrumb-item active"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">order-confirmation</li>
  </ol>
</nav>

<div class="order-inner float-left w-100">
  <div class="container">
    <div class="row">
      <div id="order-confirmation" class="card float-left w-100 mb-10">
        <div class="card-block p-20">
          <h3 class="card-title text-success">Đơn hàng của bạn đã được xác nhận</h3>
          <p>Chúng tôi đã gửi một thông báo tới email của bạn: {{ Session::get('user')->email }}.</p>
        </div>
      </div>

      <div id="order-itens" class="card float-left w-100 mb-10">
        <div class="card-block p-20">
          <h3 class="card-title">Danh sách sản phẩm</h3>
            <div class="order-confirmation-table float-left w-100">
              @foreach($cartItems as $item)
                <div class="order-line float-left w-100" style="margin-bottom: 3px">
                    <div class="row">
                      <div class="col-sm-1 col-xs-3 float-left">
                        <img src="{{ $item->book->Avatar }}" alt="">
                      </div>
                      <div class="col-sm-5 col-xs-9 details float-left">
                        <span>{{ $item->book->BookTitle }}</span>
                      </div>
                      <div class="col-sm-6 col-xs-12 qty float-left d-flex">
                        <div class="col-xs-5 col-sm-5 text-sm-right text-xs-left">{{ $item->book->CostPrice }} đ</div>
                        <div class="col-xs-2 col-sm-2">{{ $item->Quantity }}</div>
                        <div class="col-xs-5 col-sm-5 text-sm-right bold">{{ $item->book->CostPrice * $item->Quantity }} đ</div>
                      </div>
                    </div>
                </div>
              @endforeach
              <hr class="float-left w-100">
              <table class="float-left w-100 mb-30">
                <tbody>
                  <tr class="mb-10">
                    <td>Tổng giá sản phẩm</td>
                    <td class="text-right">{{ $bookPrice }} đ</td>
                  </tr>
                  <tr class="mb-10">
                    <td>Chi phí vận chuyển</td>
                    <td class="text-right">5 đ</td>
                  </tr>
                  <tr class="font-weight-bold">
                    <td>
                      <span class="text-uppercase">Tổng chi phí</span> (Đã bao gồm thuế)
                    </td>
                    <td class="text-right">{{ $totalPrice }} đ</td>
                  </tr>
                </tbody>
              </table>
              <div id="order-details" class="float-left w-100">
                <h3 class="h3 card-title">Chi tiết Đơn Hàng:</h3>
                <ul>
                  <li>Mã Đơn: {{ $orderID }}</li>
                  <li>Phương thức thanh toán: COD</li>
                  <li>
                    Đơn vị vận chuyển: Quỳnh Express<br> <em>Giao hàng tận giường</em>
                  </li>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
