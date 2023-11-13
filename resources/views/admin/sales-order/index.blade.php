@extends('admin.layout.default')

@section('template_title')
    Hoá đơn bán
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
                        <div class="ml-1"></div>
                        <div class="d-inline-block">
                            @php
                                $routeName = 'sales-order.index';
                            @endphp
                            <form id="filterForm" action="{{ route($routeName) }}" method="GET">
                                <select id="statusFilter" class="custom-select" name="status">
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Hiển thị tất cả
                                        trạng thái
                                    </option>
                                    <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Đã hoàn thành
                                    </option>
                                    <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Đang vận chuyển
                                    </option>
                                    <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>Đang chờ duyệt
                                    </option>
                                </select>
                            </form>
                        </div>

                    </div>
                    <div class="dataTables_filter" style="padding: 0; padding-top: 0.75rem">
                        <form id="searchForm" action="{{ route($routeName) }}" method="GET">
                            <div class="dataTables_filter" style="padding: 0; padding-top: 0.75rem">
                                <input type="search" id="searchInput" class="form-control form-control-sm"
                                       placeholder="Tìm kiếm theo mã hoá đơn..." name="search">
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
                    <div class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table data-bs-spy="scroll"
                                       class="table table-bordered table-striped dataTable dtr-inline table-hover table-responsive"
                                       aria-describedby="example1_info">
                                    <thead>
                                    <tr>
                                        <th>Mã hoá đơn</th>
                                        <th>Ngày bán</th>
                                        <th>Tài khoản đặt hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Địa chỉ nhận</th>
                                        <th>Họ tên người nhận</th>
                                        <th>SĐT người nhận</th>
                                        <th>Phí vận chuyển</th>
                                        <th>% giảm giá</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($salesOrders as $salesOrder)
                                        <tr class="even" onmouseover="readListScripts.showTableActions()"
                                            onmouseleave="readListScripts.hideTableActions()">
                                            <td>{{ $salesOrder->OrderID }}</td>
                                            <td>{{ $salesOrder->OrderDate }}</td>
                                            <td>{{ $salesOrder->user == null ? '' : $salesOrder->user->UserName }}</td>
                                            <td>{{ $salesOrder->OrderStatus }}</td>
                                                <?php
                                                $address = $fullname = $phonenumber = '';
                                                $spAddress = $salesOrder->shippingaddress;
                                                if ($spAddress) {
                                                    $address = "$spAddress->Ward, $spAddress->District, $spAddress->City";
                                                    $fullname = $spAddress->FullName;
                                                    $phonenumber = $spAddress->PhoneNumber;
                                                }
                                                ?>
                                            <td>{{ $address }}</td>
                                            <td>{{ $fullname }}</td>
                                            <td>{{ $phonenumber }}</td>
                                            <td>{{ $salesOrder->ShippingFee }} VNĐ</td>
                                            <td>{{ $salesOrder->Discount }} %</td>
                                            <td>{{ $salesOrder->TotalPrice }} VNĐ</td>

                                            <td style="position: absolute; right: 0; display: none">
                                                <div style="position: sticky;">
                                                    <form
                                                        action="{{ route('sales-order.destroy',$salesOrder->OrderID) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                           href="{{ route('sales-order.show',$salesOrder->OrderID) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Xem chi tiết') }}
                                                        </a>
                                                        @if($salesOrder->OrderStatus == 'Đang chờ duyệt')
                                                            <a class="btn btn-sm btn-success"
                                                               href="{{ route('sales-order.shipping',[ 'id' => $salesOrder->OrderID, 'page' => request('page')]) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> {{ __('Duyệt đơn') }}
                                                            </a>
                                                        @elseif($salesOrder->OrderStatus == 'Đang vận chuyển')
                                                            <a class="btn btn-sm btn-success"
                                                               href="{{ route('sales-order.completed', ['id' => $salesOrder->OrderID, 'page' => request('page')]) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> {{ __('Đánh dấu đã hoàn thành') }}
                                                            </a>
                                                        @endif
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Xoá') }}
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
                                {!! $salesOrders->links() !!}
                            </div>
                        </div>
                        @if($salesOrders->count() > 0)
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                        Hiển thị {{ $i + 1 }} đến {{ $i + $salesOrders->count() }} trong tổng
                                        số {{ $salesOrder->count() }} bản ghi
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
            let tableName = 'sales-order';
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
