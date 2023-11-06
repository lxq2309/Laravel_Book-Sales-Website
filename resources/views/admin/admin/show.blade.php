@extends('admin.layout.default')

@section('template_title')
    {{ $admin->Email }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thông tin quản trị viên') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mã tài khoản:</strong>
                            {{ $admin->AdminID }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $admin->Email }}
                        </div>
                        <div class="form-group">
                            <strong>Password:</strong>
                            {{ $admin->Password }}
                        </div>
                        <div class="form-group">
                            <strong>Họ và tên:</strong>
                            {{ $admin->FullName }}
                        </div>
                        <div class="form-group">
                            <strong>Số điện thoại:</strong>
                            {{ $admin->PhoneNumber }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
