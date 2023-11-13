<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Tên thể loại') }}
            {{ Form::text('CategoryName', $category->CategoryName, ['class' => 'form-control' . ($errors->has('CategoryName') ? ' is-invalid' : '')]) }}
            {!! $errors->first('CategoryName', '<div class="invalid-feedback">:message</div>') !!}
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
