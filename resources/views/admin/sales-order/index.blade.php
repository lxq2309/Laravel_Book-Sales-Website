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
                        <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>Excel</span></button>
                        <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>PDF</span></button>
                    </div>
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
                                                if($spAddress)
                                                {
                                                    $address = "$spAddress->Ward, $spAddress->District, $spAddress->City";
                                                    $fullname = $spAddress->FullName;
                                                    $phonenumber = $spAddress->PhoneNumber;
                                                }
                                                ?>
                                            <td>{{ $address }}</td>
                                            <td>{{ $fullname }}</td>
                                            <td>{{ $phonenumber }}</td>
                                            <td>{{ $salesOrder->ShippingFee }}</td>
                                            <td>{{ $salesOrder->Discount }}</td>
                                            <td>{{ $salesOrder->TotalPrice }}</td>

                                            <td style="position: absolute; right: 0; display: none">
                                                <div style="position: sticky;">
                                                    <form action="{{ route('sales-order.destroy',$salesOrder->OrderID) }}"
                                                          method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                           href="{{ route('sales-order.show',$salesOrder->OrderID) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Xem chi tiết') }}</a>
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
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                {!! $salesOrders->links() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    Hiển thị {{ $i + 1 }} đến {{ $i + $salesOrders->count() }} trong tổng
                                    số {{ $salesOrder->count() }} bản ghi
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

