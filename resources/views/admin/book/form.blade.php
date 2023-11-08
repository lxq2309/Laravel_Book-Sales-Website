<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Tên sách') }}
            {{ Form::text('BookTitle', $book->BookTitle, ['class' => 'form-control' . ($errors->has('BookTitle') ? ' is-invalid' : '')]) }}
            {!! $errors->first('BookTitle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tên tác giả') }}
            {{ Form::text('Author', $book->Author, ['class' => 'form-control' . ($errors->has('Author') ? ' is-invalid' : '')]) }}
            {!! $errors->first('Author', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nhà xuất bản') }}
            <select name="PublisherID" class="form-control">
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->PublisherID }}"
                        {{ $publisher->PublisherID == $book->PublisherID ? 'selected' : '' }}>
                        {{ $publisher->PublisherName }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Giá bán') }}
            {{ Form::text('CostPrice', $book->CostPrice, ['class' => 'form-control' . ($errors->has('CostPrice') ? ' is-invalid' : '')]) }}
            {!! $errors->first('CostPrice', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Giá khuyến mại') }}
            {{ Form::text('SellingPrice', $book->SellingPrice, ['class' => 'form-control' . ($errors->has('SellingPrice') ? ' is-invalid' : '')]) }}
            {!! $errors->first('SellingPrice', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Số trang') }}
            {{ Form::text('PageCount', $book->PageCount, ['class' => 'form-control' . ($errors->has('PageCount') ? ' is-invalid' : '')]) }}
            {!! $errors->first('PageCount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Trọng lượng') }}
            {{ Form::text('Weight', $book->Weight, ['class' => 'form-control' . ($errors->has('Weight') ? ' is-invalid' : '')]) }}
            {!! $errors->first('Weight', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ảnh đại diện') }}
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab"
                       aria-controls="tab1" aria-selected="true">Nhập URL ảnh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2"
                       aria-selected="false">Tải lên tệp</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabsContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="AvatarUrl"
                               placeholder="https://example.com/image.jpg" value="{{ $book->Avatar }}">
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                    <div class="form-group mt-4">
                        <input type="file" class="form-control-file" name="Avatar" accept="image/*">
                    </div>
                </div>
            </div>
            {!! $errors->first('Avatar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Loại bìa') }}
            <select name="CoverStyle" class="form-control">
                <option
                    value="0">-- Bìa cứng --
                </option>
                <option
                    value="1" {{ ($method == 'PATCH' && $book->CoverStyle == 1) ? 'selected' : '' }}>-- Bìa mềm --
                </option>
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Kích thước') }}
            {{ Form::text('Size', $book->Size, ['class' => 'form-control' . ($errors->has('Size') ? ' is-invalid' : '')]) }}
            {!! $errors->first('Size', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Năm xuất bản') }}
            {{ Form::text('YearPublished', $book->YearPublished, ['class' => 'form-control' . ($errors->has('YearPublished') ? ' is-invalid' : '')]) }}
            {!! $errors->first('YearPublished', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Mô tả') }}
            {{ Form::textarea('Description', $book->Description, ['class' => 'form-control' . ($errors->has('Description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('Description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Thể loại') }}
            <div class="row">
                @foreach($genres as $genre)
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="checkbox" name="bookgenre[]" value="{{ $genre->GenreID }}"
                                   {{ in_array($genre->GenreID, $selectedGenres) ? 'checked' : '' }} class="form-check-input">
                            <label class="form-check-label">{{ $genre->GenreName }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('Thuộc bộ sách') }}
            <select name="SetID" class="form-control">
                <option value="">-- Không thuộc bộ nào --</option>
                @foreach($bookSets as $bookSet)
                    <option value="{{ $bookSet->SetID }}"
                        {{ $bookSet->SetID == $book->SetID ? 'selected' : '' }}>
                        {{ $bookSet->SetTitle }}
                    </option>
                @endforeach
            </select>
        </div>


        @switch($method)
            @case('POST')
                <input type="hidden" name="CreatedBy" value="LXQ">
                @break
            @case('PATCH')
                <input type="hidden" name="ModifiedBy" value="LXQ">
                @break
        @endswitch
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Xác nhận') }}</button>
    </div>
</div>
