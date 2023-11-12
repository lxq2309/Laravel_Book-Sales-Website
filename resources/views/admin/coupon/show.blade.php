@extends('admin.layout.default')

@section('template_title')
    {{ $coupon->CouponCode }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin mã giảm giá') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('coupon.index') }}"> {{ __('Trở lại') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>CouponID:</strong>
                            {{ $coupon->CouponID }}
                        </div>
                        <div class="form-group">
                            <strong>Mã giảm giá:</strong>
                            {{ $coupon->CouponCode }}
                        </div>
                        <div class="form-group">
                            <strong>Giảm giá:</strong>
                            {{ $coupon->DiscountAmount }}%
                        </div>
                        <div class="form-group">
                            <strong>Ngày hết hạn:</strong>
                            {{ $coupon->ExpiryDate }}
                        </div>
                        <div class="form-group">
                            <strong>Trạng thái:</strong>
                            {{ $coupon->IsUsed ? 'Đã sử dụng' : 'Chưa sử dụng' }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày tạo:</strong>
                            {{ $coupon->CreatedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $coupon->CreatedBy }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày sửa:</strong>
                            {{ $coupon->ModifiedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $coupon->ModifiedBy }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
