@extends('user.layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Danh sách địa chỉ</h2>
                <ul class="list-group" id="addressList">
                    @foreach($addresses as $address)
                        <a href="#" class="list-group-item list-group-item-action" data-id="{{ $address->AddressID }}">
                            {{ $address->Address }}
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <h2>Thông tin địa chỉ</h2>
                <form id="editFormAddress">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="city">Tỉnh/Thành phố</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="district">Quận/Huyện</label>
                        <input type="text" class="form-control" id="district" name="district" required>
                    </div>
                    <div class="form-group">
                        <label for="ward">Phường/Xã</label>
                        <input type="text" class="form-control" id="ward" name="ward" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Điện thoại</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>

                    <!-- Checkbox mặc định -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="defaultCheckbox" checked>
                        <label class="form-check-label" for="defaultCheckbox">Đặt làm mặc định</label>
                    </div>

                    <input type="hidden" id="addressID">

                    <input type="hidden" id="userID" value="{{ Auth::id() }}">


                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var addressList = document.getElementById('addressList');
            var editFormAddress = document.getElementById('editFormAddress');
            var nameInput = document.getElementById('name');
            var cityInput = document.getElementById('city');
            var districtInput = document.getElementById('district');
            var wardInput = document.getElementById('ward');
            var addressInput = document.getElementById('address');
            var phoneInput = document.getElementById('phone');
            var defaultCheckbox = document.getElementById('defaultCheckbox');
            var addressIDInput = document.getElementById('addressID');

            addressList.addEventListener('click', function(event) {
                var selectedAddress = event.target;

                // Kiểm tra xem phần tử có thể nhấp được hay không
                if (selectedAddress.tagName === 'A' && selectedAddress.classList.contains('list-group-item')) {
                    // Loại bỏ lớp CSS đã chọn từ tất cả các phần tử trong danh sách
                    var allAddresses = addressList.getElementsByTagName('a');
                    for (var i = 0; i < allAddresses.length; i++) {
                        allAddresses[i].classList.remove('selected-address');
                    }

                    selectedAddress.classList.add('selected-address');

                    // Lấy ID của địa chỉ từ thuộc tính data-id
                    var addressID = selectedAddress.getAttribute('data-id');

                    addressIDInput.value = addressID;

                    fetch('/api/account/address/' + addressID)
                        .then(response => response.json())
                        .then(data => {
                            console.log(data[0]);
                            nameInput.value = data[0].FullName;
                            cityInput.value = data[0].City;
                            districtInput.value = data[0].District;
                            wardInput.value = data[0].Ward;
                            phoneInput.value = data[0].PhoneNumber;
                            addressInput.value = data[0].Address;
                            if (data[0].IsDefault === 1) {
                                defaultCheckbox.checked = true;
                            } else {
                                defaultCheckbox.checked = false;
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });

            editFormAddress.addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = {
                    name: nameInput.value,
                    city: cityInput.value,
                    district: districtInput.value,
                    phone: phoneInput.value,
                    address: addressInput.value,
                    ward: wardInput.value,
                    isDefault: defaultCheckbox.checked ? 1 : 0,
                    addressID: addressIDInput.value,
                    userID: $('#userID').val()
                };

                console.log(formData);

                fetch('/api/account/update-address', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                    .then(response => response.json())
                    .then(response => {
                        if(response.status === 200){
                            alert(response.message);
                        }
                        console.log('Update successful:', response);
                    })
                    .catch(error => console.error('Error:', error));
            });
        });



    </script>
@endsection
