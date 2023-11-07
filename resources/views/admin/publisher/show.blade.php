@extends('admin.layout.default')

@section('template_title')
    {{ $publisher->PublisherName }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin nhà xuất bản') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('publisher.index') }}"> {{ __('Trở lại') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mã nhà xuất bản:</strong>
                            {{ $publisher->PublisherID }}
                        </div>
                        <div class="form-group">
                            <strong>Tên nhà xuất bản:</strong>
                            {{ $publisher->PublisherName }}
                        </div>
                        <div class="form-group">
                            <strong>Trạng thái:</strong>
                            {{ $publisher->IsActive ? 'Đang hoạt động' : 'Ngưng hoạt động' }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày tạo:</strong>
                            {{ $publisher->CreatedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $publisher->CreatedBy }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày sửa:</strong>
                            {{ $publisher->ModifiedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $publisher->ModifiedBy }}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Các cuốn sách của nhà xuất bản <strong>{{ $publisher->PublisherName }}</strong></span>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="list-group">
                            @foreach($books as $book)
                                <a href="{{ route('book.show', $book->BookID) }}"
                                   class="list-group-item list-group-item-action">{{ $book->BookTitle }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
