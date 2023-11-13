<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Tên nhà cung cấp') }}
            {{ Form::text('SupplierName', $supplier->SupplierName, ['class' => 'form-control' . ($errors->has('SupplierName') ? ' is-invalid' : '')]) }}
            {!! $errors->first('SupplierName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Trạng thái') }}
            <select name="IsActive" class="form-control">
                <option
                    value="1">-- Đang hoạt động --</option>
                <option
                    value="0" {{ ($method == 'PATCH' && $supplier->IsActive == false) ? 'selected' : '' }}>-- Ngưng hoạt động --</option>
            </select>
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
