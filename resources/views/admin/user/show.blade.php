@extends('admin.layout.default')

@section('template_title')
    {{ $user->UserName }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>UserID:</strong>
                            {{ $user->UserID }}
                        </div>
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $user->UserName }}
                        </div>
                        <div class="form-group">
                            <strong>Password:</strong>
                            {{ $user->password }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Firstname:</strong>
                            {{ $user->FirstName }}
                        </div>
                        <div class="form-group">
                            <strong>Lastname:</strong>
                            {{ $user->LastName }}
                        </div>
                        <div class="form-group">
                            <strong>Gender:</strong>
                            {{ $user->Gender }}
                        </div>
                        <div class="form-group">
                            <strong>Phonenumber:</strong>
                            {{ $user->PhoneNumber }}
                        </div>
                        <div class="form-group">
                            <strong>Dateofbirth:</strong>
                            {{ $user->DateOfBirth }}
                        </div>
                        <div class="form-group">
                            <strong>CreatedDate:</strong>
                            {{ $user->CreatedDate }}
                        </div>
                        <div class="form-group">
                            <strong>ModifiedDate:</strong>
                            {{ $user->ModifiedDate }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
