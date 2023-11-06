@extends('admin.layout.default')

@section('template_title')
    {{ $supplier->SupplierName }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin nhà cung cấp') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('supplier.index') }}"> {{ __('Trở lại') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mã nhà cung cấp:</strong>
                            {{ $supplier->SupplierID }}
                        </div>
                        <div class="form-group">
                            <strong>Tên nhà cung cấp:</strong>
                            {{ $supplier->SupplierName }}
                        </div>
                        <div class="form-group">
                            <strong>Trạng thái:</strong>
                            {{ $supplier->IsActive ? 'Đang hoạt động' : 'Ngưng hoạt động' }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày tạo:</strong>
                            {{ $supplier->CreatedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $supplier->CreatedBy }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày sửa:</strong>
                            {{ $supplier->ModifiedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $supplier->ModifiedBy }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
