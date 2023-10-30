@extends('user.layout.layout')

@section('content')

<nav aria-label="breadcrumb" class="w-100 float-left">
    <ol class="breadcrumb parallax justify-content-center" data-source-url="/user/assets/img/banner/parallax.jpg" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account Details</li>
    </ol>
</nav>
<div class="main-content w-100 float-left blog-list">
    <div class="container">
        <div class="row">
            <div class="products-grid col-xl-9 col-lg-8 order-lg-2">
                <div class="row">
                    <div class="col-lg-12 order-lg-last account-content">
                        <h4>Edit Account Information</h4>
                        <form action="{{ route('account.update') }}" method="POST" class="myacoount-form">
                            @csrf
                            @method('PUT')
                            <div class="form-group required-field">
                                <label for="acc-email">Email</label>
                                <input type="email" class="form-control" id="acc-email" name="email" required disabled value="{{ Session::get('user')->email }}">
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group required-field">
                                                <label for="acc-name">Tên tài khoản<span class="required">*</span></label>
                                                <input type="text" class="form-control" id="acc-name" name="userName" required value="{{ Session::get('user')->UserName }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="acc-mname">Họ và tên đệm <span class="required">*</span></label>
                                                <input type="text" class="form-control" id="acc-mname" name="firstName" value="{{ Session::get('user')->FirstName }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group required-field">
                                                <label for="acc-lastname">Tên <span class="required">*</span></label>
                                                <input type="text" class="form-control" id="acc-lastname" name="lastName" value="{{ Session::get('user')->LastName }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acc-dob">Date of Birth</label>
                                        <input type="date" class="form-control" id="acc-dob" name="dateOfBirth" value="{{ Session::get('user')->DateOfBirth }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acc-phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="acc-phone" name="phoneNumber" pattern="[0-9]{10}" value="{{ Session::get('user')->PhoneNumber }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="Male" {{ Session::get('user')->Gender == 'Male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="Female" {{ Session::get('user')->Gender == 'Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="Other" {{ Session::get('user')->Gender == 'Other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="change-password-checkbox" value="1">
                                <label class="custom-control-label" for="change-password-checkbox">Change Password</label>
                            </div>

                            <div id="account-change-password" class="">
                                <h4>Change Password</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label for="account-pass2">Password</label>
                                            <input type="password" class="form-control" id="account-pass2" name="account-pass2">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label for="account-pass3">Confirm Password</label>
                                            <input type="password" class="form-control" id="account-pass3" name="account-pass3">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="required text-right">* Required Field</div>
                            <div class="form-footer d-flex justify-content-between align-items-center">
                                <a href="#"><i class="material-icons">navigate_before</i>Back</a>

                                <div class="form-footer-right">
                                    <button type="submit" class="btn btn-primary btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidebar col-xl-3 col-lg-3 order-lg-1">
                <div class="sidebar-product left-sidebar w-100 float-left">
                    <div class="title">
                        <a data-toggle="collapse" href="#sidebar-product" aria-expanded="false" aria-controls="sidebar-product" class="d-lg-none block-toggler">sale products</a>
                    </div>
                    <div id="sidebar-product" class="collapse w-100 float-left">
                        <div class="sidebar-block sale products">
                            <h3 class="widget-title">sale products</h3>
                            <div class="product-layouts">
                                <div class="product-thumb">
                                    <div class="image col-sm-4 float-left">
                                        <a href="#">
                                            <img src="img/products/01.jpg" alt="01"/>										
                                        </a>									
                                    </div>
                                    <div class="thumb-description col-sm-8 text-left float-left">
                                        <div class="caption">
                                            <h4 class="product-title text-capitalize"><a href="product-details.html">aliquam quaerat voluptatem</a></h4>
                                        </div>
                                        <div class="price">
                                            <div class="regular-price">$100.00</div>
                                            <div class="old-price">$150.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-layouts">
                                <div class="product-thumb">
                                    <div class="image col-sm-4 float-left">
                                        <a href="#">
                                            <img src="img/products/02.jpg" alt="01"/>										
                                        </a>									
                                    </div>
                                    <div class="thumb-description col-sm-8 text-left float-left">
                                        <div class="caption">
                                            <h4 class="product-title text-capitalize">
                                                <a href="product-details.html">aspetur autodit autfugit</a>
                                            </h4>
                                        </div>
                                        <div class="price">
                                            <div class="regular-price">$100.00</div>
                                            <div class="old-price">$150.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-layouts">
                                <div class="product-thumb">
                                    <div class="image col-sm-4 float-left">
                                        <a href="#">
                                            <img src="img/products/03.jpg" alt="03"/>										
                                        </a>									
                                    </div>
                                    <div class="thumb-description col-sm-8 text-left float-left">
                                        <div class="caption">
                                            <h4 class="product-title text-capitalize"><a href="product-details.html">magni dolores eosquies</a></h4>
                                        </div>
                                        <div class="price">
                                            <div class="regular-price">$100.00</div>
                                            <div class="old-price">$150.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection