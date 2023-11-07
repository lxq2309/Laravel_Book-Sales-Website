@extends('admin.layout.default')

@section('template_title')
    Sách
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="dt-buttons btn-group flex-wrap">
                        <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>Excel</span></button>
                        <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>PDF</span></button>
                    </div>
                    <a href="{{ route('purchase-order.create') }}" class="btn btn-primary float-right"
                       data-placement="left">
                        {{ __('Nhập sách') }}
                    </a>
                    <div class="dataTables_filter" style="padding: 0; padding-top: 0.75rem"><input type="search"
                                                                                                   class="form-control form-control-sm"
                                                                                                   placeholder="Tìm kiếm..."
                                                                                                   aria-controls="example1">
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table data-bs-spy="scroll"
                                       class="table table-bordered table-striped dataTable dtr-inline table-hover table-responsive"
                                       aria-describedby="example1_info">
                                    <thead>
                                    <tr>
                                        <th>Mã sách</th>
                                        <th>Tên sách</th>
                                        <th>Tác giả</th>
                                        <th>Nhà xuất bản</th>
                                        <th>Giá bán</th>
                                        <th>Giá khuyến mại</th>
                                        <th>Số lượng</th>
                                        <th>Số trang</th>
                                        <th>Trọng lượng</th>
                                        <th>Ảnh</th>
                                        <th>Loại bìa</th>
                                        <th>Kích tước</th>
                                        <th>Năm xuất bản</th>
                                        <th>Thuộc bộ sách</th>
                                        <th>Số lượng ảnh đính kèm</th>
                                        <th>Lượt xem</th>
                                        <th>Ngày tạo</th>
                                        <th>Người tạo</th>
                                        <th>Ngày sửa</th>
                                        <th>Người sửa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($books as $book)
                                        <tr class="even" onmouseover="readListScripts.showTableActions()"
                                            onmouseleave="readListScripts.hideTableActions()">
                                            <td>{{ $book->BookID }}</td>
                                            <td>{{ $book->BookTitle }}</td>
                                            <td>{{ $book->Author }}</td>
                                            @php
                                                $publisherName = $book->publisher == null ? '' : $book->publisher->PublisherName;
                                                $publisherId = $book->publisher == null ? '' : $book->publisher->PublisherID;
                                            @endphp
                                            <td>
                                                <a href="{{ route('publisher.show', $publisherId)}}">{{ $publisherName }}</a>
                                            </td>
                                            <td>{{ $book->CostPrice }}</td>
                                            <td>{{ $book->SellingPrice }}</td>
                                            <td>{{ $book->QuantityInStock }}</td>
                                            <td>{{ $book->PageCount }}</td>
                                            <td>{{ $book->Weight }}</td>
                                            <td><img src="{{ $book->Avatar }}" alt="{{ $book->BookTitle }}"
                                                     class="img-thumbnail rounded check-image" style="max-width: 100px">
                                            </td>
                                            <td>{{ $book->CoverStyle }}</td>
                                            <td>{{ $book->Size }}</td>
                                            <td>{{ $book->YearPublished }}</td>
                                            @php
                                                $setTitle = $book->bookset == null ? '' : $book->bookset->SetTitle;
                                                $setId = $book->bookset == null ? '' : $book->bookset->SetID;
                                            @endphp
                                            <td><a href="{{ route('bookset.show', $setId) }}">{{ $setTitle }}</a></td>
                                            <td>{{ $book->bookimages->count() }}</td>
                                            <td>{{ $book->ViewCount }}</td>
                                            <td>{{ $book->CreatedDate }}</td>
                                            <td>{{ $book->CreatedBy }}</td>
                                            <td>{{ $book->ModifiedDate }}</td>
                                            <td>{{ $book->ModifiedBy }}</td>

                                            <td style="position: absolute; right: 0; display: none">
                                                <div style="position: sticky;">
                                                    <form action="{{ route('book.destroy',$book->BookID) }}"
                                                          method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                           href="{{ route('book.show',$book->BookID) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                           href="{{ route('book.edit',$book->BookID) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                {!! $books->links() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    Hiển thị {{ $i + 1 }} đến {{ $i + $books->count() }} trong tổng
                                    số {{ $book->count() }} bản ghi
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

