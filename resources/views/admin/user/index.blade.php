@extends('admin.layout.default')

@section('template_title')
    User
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
                        <button class="btn btn-secondary buttons-print" tabindex="0"
                                aria-controls="example1" type="button"><span>Print</span></button>
                    </div>
                    <a href="{{ route('user.create') }}" class="btn btn-primary float-right"
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
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1"
                                       class="table table-bordered table-striped dataTable dtr-inline table-hover table table-responsive"
                                       aria-describedby="example1_info">
                                    <thead>
                                    <tr>
                                        <th>UserID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Gender</th>
                                        <th>Phonenumber</th>
                                        <th>Dateofbirth</th>
                                        <th>Createddate</th>
                                        <th>Modifieddate</th>
                                        <th>Confirmcode</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr class="even" onmouseover="readListScripts.showTableActions()"
                                            onmouseleave="readListScripts.hideTableActions()">
                                            <td>{{ $user->UserID }}</td>
                                            <td>{{ $user->UserName }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->FirstName }}</td>
                                            <td>{{ $user->LastName }}</td>
                                            <td>{{ $user->Gender }}</td>
                                            <td>{{ $user->PhoneNumber }}</td>
                                            <td>{{ $user->DateOfBirth }}</td>
                                            <td>{{ $user->CreatedDate }}</td>
                                            <td>{{ $user->ModifiedDate }}</td>
                                            <td>{{ $user->ConfirmCode }}</td>

                                            <td style="position: absolute; right: 0; display: none">
                                                <div style="position: sticky;">
                                                    <form action="{{ route('user.destroy',$user->UserID) }}"
                                                          method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                           href="{{ route('user.show',$user->UserID) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                           href="{{ route('user.edit',$user->UserID) }}"><i
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
                            <div class="col-sm-12 col-md-7 ">
                                {!! $users->links() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    Hiển thị  {{ $i + 1 }} đến {{ $i + $users->count() }} trong tổng số {{ $user->count() }} bản ghi
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

