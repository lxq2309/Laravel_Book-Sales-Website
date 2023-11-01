@extends('user.layout.layout')

@section('content')

<nav aria-label="breadcrumb" class="w-100 float-left">
    <ol class="breadcrumb parallax justify-content-center" data-source-url="/user/assets/img/banner/parallax.jpg" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account Detail</li>
    </ol>
</nav>
<div class="main-content w-100 float-left blog-list">
    <div class="container">
        <div class="row">
            <div class="products-grid col-xl-9 col-lg-8 order-lg-2">
                <div class="row">
                    <div class="col-lg-12 order-lg-last account-content">
                        <h4>Thông Tin Tài Khoản</h4>
                        <form id="account-form" action="{{ route('account.update') }}" method="POST" class="myacoount-form">
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
                                        <label for="acc-dob">Ngày Sinh</label>
                                        <input type="date" class="form-control" id="acc-dob" name="dateOfBirth" value="{{ Session::get('user')->DateOfBirth }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acc-phone">Số Điện Thoại</label>
                                        <input type="tel" class="form-control" id="acc-phone" name="phoneNumber" pattern="[0-9]{10}" value="{{ Session::get('user')->PhoneNumber }}">
                                        @error('phoneNumber')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="Male" {{ Session::get('user')->Gender == 'Male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Trai</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="Female" {{ Session::get('user')->Gender == 'Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Gái</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="Other" {{ Session::get('user')->Gender == 'Other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Khác</label>
                                </div>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="change-password-checkbox" value="1">
                                <label class="custom-control-label" for="change-password-checkbox">Change Password</label>
                            </div>

                            <div id="account-change-password" class="">
                                <h4>Đổi mật khẩu</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label for="account-pass2">Mật khẩu mới</label>
                                            <input id="new-pass" type="password" class="form-control" id="account-pass2" name="new-pass">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label for="account-pass3">Xác nhận mật khẩu mới</label>
                                            <input id="new-pass-confirm" type="password" class="form-control" id="account-pass3" name="new-pass-confirm">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="required text-right">* Bắt buộc điền</div>
                            <div class="form-footer d-flex justify-content-between align-items-center">
                                <a href="javascript:history.back()"><i class="material-icons">navigate_before</i>Quay lại</a>

                                <div class="form-footer-right">
                                    <button type="submit" class="btn btn-primary btn-primary">Lưu</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#account-form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'PUT',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    if (response.error) {
                        if (response.message === 'password not same') {
                            $('#new-pass-confirm + .text-danger').remove();
                            $('#new-pass-confirm').after('<div class="text-danger">Mật khẩu không giống nhau</div>');
                        } else {
                            console.error(response.message);
                        }
                    } else {
                        window.location.reload();
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
</script>