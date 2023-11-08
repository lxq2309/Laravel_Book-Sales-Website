@extends('admin.layout.default')

@section('template_title')
    {{ $genre->GenreName }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin thể loại') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('genre.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mã thể loại:</strong>
                            {{ $genre->GenreID }}
                        </div>
                        <div class="form-group">
                            <strong>Tên thể loại:</strong>
                            {{ $genre->GenreName }}
                        </div>
                        <div class="form-group">
                            <strong>Thuộc danh mục:</strong>
                            {{ $genre->category?->CategoryName }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày tạo:</strong>
                            {{ $genre->CreatedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $genre->CreatedBy }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày sửa:</strong>
                            {{ $genre->ModifiedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $genre->ModifiedBy }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
