@extends('admin.layout.default')

@section('template_title')
    {{ __('Thêm mới mã giảm giá') }}
@endsection

@php
    $method = "POST";
@endphp

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Thêm mới') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('coupon.index') }}"> {{ __('Trở lại') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('coupon.store') }}" role="form"
                              enctype="multipart/form-data">
                            @csrf

                            @include('admin.coupon.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
