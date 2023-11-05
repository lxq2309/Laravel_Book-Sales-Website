@extends('admin.layout.default')

@section('template_title')
    {{ __('Create') }} User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
