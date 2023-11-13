<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Tên thể loại') }}
            {{ Form::text('GenreName', $genre->GenreName, ['class' => 'form-control' . ($errors->has('GenreName') ? ' is-invalid' : '')]) }}
            {!! $errors->first('GenreName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Thuộc danh mục') }}
            @php
                $categories = \App\Models\admin\Category::all();
            @endphp
            <select name="CategoryID" class="form-control">
                <option value="">-- Chưa có --</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->CategoryID }}" {{ ($category->CategoryID == $genre->CategoryID) ? 'selected' : '' }}>{{ $category->CategoryName }}</option>
                @endforeach
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
