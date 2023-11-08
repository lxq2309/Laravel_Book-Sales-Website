@extends('admin.layout.default')

@section('template_title')
    {{ "Hoá đơn $purchaseOrder->OrderID" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin') }} hoá đơn nhập</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales-order.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mã hoá đơn:</strong>
                            {{ $purchaseOrder->OrderID }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày nhập</strong>
                            {{ $purchaseOrder->OrderDate }}
                        </div>
                        <div class="form-group">
                            <strong>Nhà cung cấp</strong>
                            {{ $purchaseOrder->supplier == null ? '' : $purchaseOrder->supplier->SupplierName }}
                        </div>
                        <div class="form-group">
                            <strong>Trạng thái:</strong>
                            {{ $purchaseOrder->OrderStatus }}
                        </div>
                        <div class="form-group">
                            <strong>Tổng tiền:</strong>
                            {{ $purchaseOrder->TotalPrice }}
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
                        @foreach($purchaseOrderDetails as $purchaseOrderDetail)
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="float-left">
                                        <span class="card-title">{{ $purchaseOrderDetail->book->BookTitle }}</span>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Số lượng:</strong>
                                        {{ $purchaseOrderDetail->QuantitySold }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Giá bán:</strong>
                                        {{ $purchaseOrderDetail->Price }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Thành tiền:</strong>
                                        {{ $purchaseOrderDetail->SubTotal }}
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
