@extends('admin.layout.default')

@section('template_title')
    {{ $category->CategoryName }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin danh mục') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('category.index') }}"> {{ __('Trở về') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mã thể loại:</strong>
                            {{ $category->CategoryID }}
                        </div>
                        <div class="form-group">
                            <strong>Tên thể loại:</strong>
                            {{ $category->CategoryName }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày tạo:</strong>
                            {{ $category->CreatedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $category->CreatedBy }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày sửa:</strong>
                            {{ $category->ModifiedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $category->ModifiedBy }}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Các thể loại thuộc <strong>{{ $category->CategoryName }}</strong></span>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="list-group">
                            @foreach($genres as $genre)
                                <a href="{{ route('genre.show', $genre->GenreID) }}"
                                   class="list-group-item list-group-item-action">{{ $genre->GenreName }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
