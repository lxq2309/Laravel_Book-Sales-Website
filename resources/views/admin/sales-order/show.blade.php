@extends('admin.layout.default')

@section('template_title')
    {{ "Hoá đơn $salesOrder->OrderID" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin') }} hoá đơn bán</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales-order.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mã hoá đơn:</strong>
                            {{ $salesOrder->OrderID }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày bán</strong>
                            {{ $salesOrder->OrderDate }}
                        </div>
                        <div class="form-group">
                            <strong>Tài khoản đặt:</strong>
                            {{ $salesOrder->user == null ? '' : $salesOrder->user->UserName }}
                        </div>
                        <div class="form-group">
                            <strong>Trạng thái:</strong>
                            {{ $salesOrder->OrderStatus }}
                        </div>
                        <?php
                        $address = $fullname = $phonenumber = '';
                        $spAddress = $salesOrder->shippingaddress;
                        if ($spAddress) {
                            $address = "$spAddress->Ward, $spAddress->District, $spAddress->City";
                            $fullname = $spAddress->FullName;
                            $phonenumber = $spAddress->PhoneNumber;
                        }
                        ?>
                        <div class="form-group">
                            <strong>Địa chỉ:</strong>
                            {{ $address }}
                        </div>
                        <div class="form-group">
                            <strong>Họ và tên người đặt:</strong>
                            {{ $fullname }}
                        </div>
                        <div class="form-group">
                            <strong>Số điện thoại người đặt</strong>
                            {{ $phonenumber }}
                        </div>
                        <div class="form-group">
                            <strong>Phí vận chuyển:</strong>
                            {{ $salesOrder->ShippingFee }} VNĐ
                        </div>
                        <div class="form-group">
                            <strong>% giảm giá:</strong>
                            {{ $salesOrder->Discount }} %
                        </div>
                        <div class="form-group">
                            <strong>Tổng tiền:</strong>
                            {{ $salesOrder->TotalPrice }} VNĐ
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Chi tiết hoá đơn</span>
                        </div>
                    </div>


                    <div class="card-body">
                        @foreach($salesOrderDetails as $salesOrderDetail)
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="float-left">
                                        <span class="card-title">{{ $salesOrderDetail->book?->BookTitle }}</span>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Số lượng:</strong>
                                        {{ $salesOrderDetail->QuantitySold }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Giá bán:</strong>
                                        {{ $salesOrderDetail->Price }} VNĐ
                                    </div>
                                    <div class="form-group">
                                        <strong>Thành tiền:</strong>
                                        {{ $salesOrderDetail->SubTotal }} VNĐ
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
