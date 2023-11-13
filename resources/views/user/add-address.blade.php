@extends('user.layout.layout')

@section('content')
    <div class="container mt-5">
        <h4>Thêm mới địa chỉ</h4>
        <form id="addForm">
            <!-- Tên -->
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên">
            </div>

            <!-- Thành phố -->
            <div class="form-group">
                <label for="city">Tỉnh/Thành phố:</label>
                <input type="text" class="form-control" id="city" placeholder="Nhập thành phố">
            </div>

            <!-- Quận -->
            <div class="form-group">
                <label for="district">Quận/Huyện:</label>
                <input type="text" class="form-control" id="district" placeholder="Nhập quận">
            </div>

            <!-- Huyện -->
            <div class="form-group">
                <label for="ward">Phường/Xã:</label>
                <input type="text" class="form-control" id="ward" placeholder="Nhập huyện">
            </div>

            <!-- Địa chỉ -->
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ">
            </div>

            <!-- Số điện thoại -->
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="number" class="form-control" id="phone" placeholder="Nhập số điện thoại">
            </div>

            <!-- Checkbox mặc định -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="defaultCheckbox" checked>
                <label class="form-check-label" for="defaultCheckbox">Đặt làm mặc định</label>
            </div>

            <!-- Dữ liệu userID -->
            <input type="hidden" id="userID" value="{{ Auth::id() }}">

            <!-- Nút submit -->
            <input type="submit" class="btn btn-primary mt-3">
        </form>
    </div>
@endsection


@section('scripts')
    <script>
        // Bắt sự kiện submit của form
        $('#addForm').submit(function (event) {
            // Ngăn chặn hành vi mặc định của form
            event.preventDefault();

            if (!$('#name').val() || !$('#city').val() || !$('#address').val() || !$('#phone').val()) {
                alert('Vui lòng điền đầy đủ thông tin.');
                return;
            }
            // Lấy dữ liệu từ form
            var formData = {
                name: $('#name').val(),
                city: $('#city').val(),
                district: $('#district').val(),
                ward: $('#ward').val(),
                address: $('#address').val(),
                phone: $('#phone').val(),
                defaultCheckbox: $('#defaultCheckbox').prop('checked'),
                userID: $('#userID').val()
            };

            // Sử dụng fetch API để gửi dữ liệu đến server
            fetch('/api/account/addressnew', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            })
                .then(response => response.json())
                .then(function(response) {
                    console.log(response)
                    if(response.status === 200){
                        window.location.href = "{{ route('account.detail') }}"
                    }

                })
                .then(data => {

                })
                .catch(error => {
                    console.error('Lỗi khi gửi dữ liệu:', error);
                });
        });
    </script>
@endsection
