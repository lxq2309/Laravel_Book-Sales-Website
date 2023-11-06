@extends('admin.layout.default')

@section('template_title')
    {{ $bookset->SetTitle }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin tập sách') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bookset.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mã tập sách:</strong>
                            {{ $bookset->SetID }}
                        </div>
                        <div class="form-group">
                            <strong>Tên tập sách:</strong>
                            {{ $bookset->SetTitle }}
                        </div>
                        <div class="form-group">
                            <strong>Ảnh:</strong>
                            {{ $bookset->SetAvatar }}
                        </div>
                        <div class="form-group">
                            <strong>Số lượng sách:</strong>
                            {{ $books->count() }}
                        </div>
                        <div class="form-group">
                            <strong>Mô tả:</strong>
                            {{ $bookset->Description == null ? 'Chưa có mô tả' : $bookset->Description }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày tạo:</strong>
                            {{ $bookset->CreatedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $bookset->CreatedBy }}
                        </div>
                        <div class="form-group">
                            <strong>Ngày sửa:</strong>
                            {{ $bookset->ModifiedDate }}
                        </div>
                        <div class="form-group">
                            <strong>Người tạo:</strong>
                            {{ $bookset->ModifiedBy }}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Các cuốn sách thuộc <strong>{{ $bookset->SetTitle }}</strong></span>
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
