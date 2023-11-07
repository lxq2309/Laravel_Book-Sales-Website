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
                            <span class="card-title">{{ __('Thông tin bộ sách') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bookset.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <img src="{{ $bookset->SetAvatar }}" alt="{{ $bookset->SetTitle }}" class="img-thumbnail rounded" style="max-width: 300px">
                        </div>

                        <div class="form-group">
                            <strong>Mã bộ sách:</strong>
                            {{ $bookset->SetID }}
                        </div>
                        <div class="form-group">
                            <strong>Tên bộ sách:</strong>
                            {{ $bookset->SetTitle }}
                        </div>
                        <div class="form-group">
                            <strong>Đường dẫn ảnh:</strong>
                            {{ $bookset->SetAvatar }}
                        </div>
                        <div class="form-group">
                            <strong>Số lượng sách:</strong>
                            {{ $books->count() }}
                        </div>
                        <div class="form-group">
                            <strong>Mô tả:</strong>
                            {{ $books->count() == 0 ? 'Chưa có mô tả' : ($books[0]->Description == null ? 'Chưa có mô tả' : $books[0]->Description) }}
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
                            <span
                                class="card-title">Các cuốn sách thuộc <strong>{{ $bookset->SetTitle }}</strong></span>
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
