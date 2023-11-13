<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Mã giảm giá') }}
            {{ Form::text('CouponCode', $coupon->CouponCode, ['class' => 'form-control' . ($errors->has('CouponCode') ? ' is-invalid' : '')]) }}
            {!! $errors->first('CouponCode', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('% giảm giá') }}
            {{ Form::number('DiscountAmount', $coupon->DiscountAmount, ['class' => 'form-control' . ($errors->has('DiscountAmount') ? ' is-invalid' : '')]) }}
            {!! $errors->first('DiscountAmount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ngày hết hạn') }}
            {{ Form::date('ExpiryDate', $coupon->ExpiryDate, ['class' => 'form-control' . ($errors->has('ExpiryDate') ? ' is-invalid' : '')]) }}
            {!! $errors->first('ExpiryDate', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @switch($method)
            @case('POST')
                <input type="hidden" name="CreatedBy" value="{{ session('admin_name') }}">
                @break
            @case('PATCH')
                <input type="hidden" name="ModifiedBy" value="{{ session('admin_name') }}">
                @break
        @endswitch
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Xác nhận') }}</button>
    </div>
</div>
