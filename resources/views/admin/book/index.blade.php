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
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="exportData"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Xuất dữ liệu
                            </button>
                            <div class="dropdown-menu" aria-labelledby="exportData">
                                <a class="dropdown-item" href="#" id="buttons-excel">Excel</a>
                                <a class="dropdown-item" href="#" id="buttons-pdf">PDF</a>
                            </div>
                        </div>
                        <div class="ml-1"></div>
                        <div class="dropdown">
                            @php
                                $order = request('order');
                                $oldest = 'cũ nhất';
                                $newest = 'mới nhất';
                                $orderText = $order == 'desc' ? $oldest : $newest;
                            @endphp
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="filterData"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sắp xếp theo: {{ $orderText }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="filterData">
                                @php
                                    $status = request('status');
                                    $statusParam = (empty($status) || $status == 1) ? '' : "&status=$status";
                                @endphp
                                <a class="dropdown-item {{ $orderText == $newest ? 'my-selected' : '' }}"
                                   href="?order=asc{{ $statusParam }}">Mới nhất</a>
                                <a class="dropdown-item {{ $orderText == $oldest ? 'my-selected' : '' }}"
                                   href="?order=desc{{ $statusParam }}">Cũ nhất</a>
                            </div>
                        </div>
                        @php
                            $routeName = 'book.index';
                        @endphp

                    </div>
                    <a href="{{ route('book.create') }}" class="btn btn-primary float-right"
                       data-placement="left">
                        {{ __('Thêm sách mới') }}
                    </a>
                    <div class="dataTables_filter" style="padding: 0; padding-top: 0.75rem">
                        <form id="searchForm" action="{{ route($routeName) }}" method="GET">
                            <div class="dataTables_filter" style="padding: 0; padding-top: 0.75rem">
                                <input type="search" id="searchInput" class="form-control form-control-sm"
                                       placeholder="Tìm kiếm theo tên sách" name="search">
                            </div>
                        </form>
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
                                            <td>{{ $book->CostPrice }} VNĐ</td>
                                            <td>{{ $book->SellingPrice }} VNĐ</td>
                                            <td>{{ $book->QuantityInStock }}</td>
                                            <td>{{ $book->PageCount }}</td>
                                            <td>{{ $book->Weight }} gram</td>
                                            <td><img src="{{ $book->Avatar }}" alt="{{ $book->BookTitle }}"
                                                     class="img-thumbnail rounded check-image" style="max-width: 100px">
                                            </td>
                                            <td>{{ $book->CoverStyle }}</td>
                                            <td>{{ $book->Size }} cm</td>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                {!! $books->links() !!}
                            </div>
                        </div>
                        @if($books->count() > 0)
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                        Hiển thị {{ $i + 1 }} đến {{ $i + $books->count() }} trong tổng
                                        số {{ $book->count() }} bản ghi
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('exportToExcelScripts')
    <script>
        function exportToExcel() {
            let tableName = 'book';
            let apiUrl = `/api/${tableName}/all`;
            alert('Đang xuất thành file ' + tableName + '.xlsx');
            // Lấy dữ liệu từ API
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // Chuyển đổi dữ liệu thành định dạng Excel
                    const workbook = XLSX.utils.book_new();
                    const worksheet = XLSX.utils.json_to_sheet(data);
                    XLSX.utils.book_append_sheet(workbook, worksheet, tableName);

                    // Xuất Excel
                    XLSX.writeFile(workbook, tableName + '.xlsx');
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }
    </script>
@endsection
