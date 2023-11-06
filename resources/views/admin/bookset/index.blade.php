@extends('admin.layout.default')

@section('template_title')
    Tập sách
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
                    <a href="{{ route('bookset.create') }}" class="btn btn-primary float-right"
                       data-placement="left">
                        {{ __('Create New') }}
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
                    <div class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table data-bs-spy="scroll"
                                       class="table table-bordered table-striped dataTable dtr-inline table-hover"
                                       aria-describedby="example1_info">
                                    <thead>
                                    <tr>
                                        <th>Mã tập sách</th>
                                        <th>Tên tập sách</th>
                                        <th>Ảnh</th>
                                        <th>Số lượng sách</th>
                                        <th>Ngày tạo</th>
                                        <th>Người tạo</th>
                                        <th>Ngày sửa</th>
                                        <th>Người sửa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($booksets as $bookset)
                                        <tr class="even" onmouseover="readListScripts.showTableActions()"
                                            onmouseleave="readListScripts.hideTableActions()">
                                            <td>{{ $bookset->SetID }}</td>
                                            <td>{{ $bookset->SetTitle }}</td>
                                            <td>{{ $bookset->SetAvatar }}</td>
                                            <td>{{ $bookset->books->count() }}</td>
                                            <td>{{ $bookset->CreatedDate }}</td>
                                            <td>{{ $bookset->CreatedBy }}</td>
                                            <td>{{ $bookset->ModifiedDate }}</td>
                                            <td>{{ $bookset->ModifiedBy }}</td>

                                            <td style="position: absolute; right: 0; display: none">
                                                <div style="position: sticky;">
                                                    <form action="{{ route('bookset.destroy',$bookset->SetID) }}"
                                                          method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                           href="{{ route('bookset.show',$bookset->SetID) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                           href="{{ route('bookset.edit',$bookset->SetID) }}"><i
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
                                {!! $booksets->links() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    Hiển thị {{ $i + 1 }} đến {{ $i + $booksets->count() }} trong tổng
                                    số {{ $bookset->count() }} bản ghi
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

