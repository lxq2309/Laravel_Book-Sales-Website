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
                            <a href="{{ route('purchase-order.edit', $purchaseOrder->OrderID) }}" class="btn btn-outline-primary"><i class="fa-solid fa-pen"></i> Sửa thông tin</a>
                            <a class="btn btn-primary" href="{{ route('purchase-order.index') }}"> {{ __('Quay lại') }}</a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

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
                            <strong>Tổng tiền:</strong>
                            {{ $purchaseOrder->TotalPrice }} VNĐ
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
                                        {{ $purchaseOrderDetail->QuantityReceived }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Giá bán:</strong>
                                        {{ $purchaseOrderDetail->Price }} VNĐ
                                    </div>
                                    <div class="form-group">
                                        <strong>Thành tiền:</strong>
                                        {{ $purchaseOrderDetail->SubTotal }} VNĐ
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
