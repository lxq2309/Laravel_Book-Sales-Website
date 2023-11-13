<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group required">
            {{ Form::label('Ngày nhập') }}
            {{ Form::datetimelocal('OrderDate', $purchaseOrder->OrderDate, ['class' => 'form-control' . ($errors->has('OrderDate') ? ' is-invalid' : '')]) }}
            {!! $errors->first('OrderDate', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group required">
            {{ Form::label('Nhà cung cấp') }}
            <select name="SupplierID" class="form-control">
                <option value="">-- Chọn nhà cung cấp --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->SupplierID }}"
                        {{ $supplier->SupplierID == $purchaseOrder->SupplierID ? 'selected' : '' }}>
                        {{ $supplier->SupplierName }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Add Purchase Order Detail fields -->
        <div class="form-group">
            <label for="bookSearch">Tìm Mã Sách / <a class="btn-link" href="{{ route('book.create') }}" target="_blank">Thêm
                    Sách Mới</a> </label>
            <input type="text" class="form-control" id="bookSearch" placeholder="Nhập tên sách">
            <select id="bookSearchResults" class="form-control" style="margin-top: 10px;">
                <option value="">Kết quả sẽ hiển thị ở đây.</option>
            </select>
        </div>

        <!-- Selected Book Information -->
        <div id="selectedBookInfo"></div>

        <div class="form-group required">
            <label for="">Chi tiết hoá đơn</label>
            <div class="card">
                <div class="card-body" id="additionalBooks">
                    @if($method != 'PATCH')
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <span class="card-title"></span>
                                    <button type="button" class="btn btn-xs btn-danger ml-1"
                                            onclick="deleteBookField()">Xoá
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Mã sách:</label>
                                    <input type="text" class="form-control" name="BookID[]" onchange="setTitle()">
                                </div>
                                <div class="form-group">
                                    <label for="">Số lượng:</label>
                                    <input type="number" class="form-control" name="QuantityReceived[]">
                                </div>
                                <div class="form-group">
                                    <label for="">Giá tiền:</label>
                                    <input type="number" class="form-control" name="Price[]">
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach($purchaseOrder->purchaseorderdetail as $orderdetail)
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="float-left">
                                        <span class="card-title">{{ $orderdetail->book?->BookTitle }}</span>
                                        <button type="button" class="btn btn-xs btn-danger ml-1"
                                                onclick="deleteBookField()">Xoá
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Mã sách:</label>
                                        <input type="text" class="form-control" name="BookID[]" onchange="setTitle()"
                                               value="{{ $orderdetail->BookID }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số lượng:</label>
                                        <input type="number" class="form-control" name="QuantityReceived[]"
                                               value="{{ $orderdetail->QuantityReceived }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá tiền:</label>
                                        <input type="number" class="form-control" name="Price[]"
                                               value="{{ $orderdetail->Price }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm mb-5" onclick="addBookField()">Thêm</button>
        </div>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Xác nhận') }}</button>
    </div>
</div>

@section('formPurchaseOrderScripts')
    <script>
        // Hàm debounce để trì hoãn gọi hàm search
        function debounce(func, delay) {
            let timeoutId;
            return function (...args) {
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => {
                    func.apply(this, args);
                }, delay);
            };
        }

        // Hàm tìm kiếm với debounce
        const debouncedSearch = debounce(function (searchTerm) {
            if (searchTerm.trim() !== '') {
                // Make an AJAX request to the book search API
                fetch('/api/book/search/' + searchTerm)
                    .then(response => response.json())
                    .then(data => displaySearchResults(data));
            } else {
                // Clear the search results
                document.getElementById('bookSearchResults').innerHTML = '<option value="">Kết quả sẽ hiển thị ở đây</option>';
            }
        }, 1000); // 3000ms debounce time

        // Event listener với debounce
        document.getElementById('bookSearch').addEventListener('input', function () {
            var searchTerm = this.value;
            debouncedSearch(searchTerm);
        });

        // Function to display search results
        function displaySearchResults(results) {
            var resultsContainer = document.getElementById('bookSearchResults');
            resultsContainer.innerHTML = '';

            if (results.length > 0) {
                results.forEach(book => {
                    var resultOption = document.createElement('option');
                    resultOption.value = book.BookID;
                    resultOption.textContent = book.BookTitle;
                    resultsContainer.appendChild(resultOption);
                });
                displaySelectedBook(results[0]);
            } else {
                resultsContainer.innerHTML = '<option value="">Không tìm thấy cuốn sách nào.</option>';
                document.getElementById('selectedBookInfo').innerHTML = '';
            }
        }

        // Function to select a book and display its information
        document.getElementById('bookSearchResults').addEventListener('change', function () {
            var selectedBookId = this.value;
            if (selectedBookId !== '') {
                // Make an AJAX request to get the details of the selected book
                fetch('/api/book/' + selectedBookId)
                    .then(response => response.json())
                    .then(book => displaySelectedBook(book));
            } else {
                document.getElementById('selectedBookInfo').innerHTML = '';
            }
        });

        // Function to display selected book information
        function displaySelectedBook(book) {
            var selectedBookInfo = document.getElementById('selectedBookInfo');
            selectedBookInfo.innerHTML = `<p><mark>Sách đang chọn: ${book.BookTitle} - Mã sách: <strong>${book.BookID}</strong></mark>`;
        }

        // Function to add additional book fields dynamically
        function addBookField() {
            var additionalBooks = document.getElementById('additionalBooks');
            var newBookField = document.createElement('div');
            newBookField.innerHTML = `
            <div class="card card-info">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title"></span>
                        <button type="button" class="btn btn-xs btn-danger ml-1" onclick="deleteBookField()">Xoá</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Mã sách:</label>
                        <input type="text" class="form-control" name="BookID[]" onchange="setTitle()">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng:</label>
                        <input type="number" class="form-control" name="QuantityReceived[]">
                    </div>
                    <div class="form-group">
                        <label for="">Giá tiền:</label>
                        <input type="number" class="form-control" name="Price[]">
                    </div>
                </div>
            </div>`;
            additionalBooks.appendChild(newBookField);
        }

        function deleteBookField() {
            let card = event.currentTarget.parentNode.parentNode.parentNode;
            card.remove();
        }


        function setTitle() {
            let cardTitle = event.currentTarget.parentNode.parentNode.parentNode.querySelector('.card-title');
            let bookID = event.currentTarget.value;
            if (bookID !== '') {
                fetch('/api/book/' + bookID)
                    .then(response => response.json())
                    .then(book => {
                        cardTitle.innerHTML = book.BookTitle;
                    });
            }
        }


        document.getElementById('submitBtn').addEventListener('click', function (event) {
            event.preventDefault();

            if (validateForm()) {
                document.querySelector('form').submit();
            }
        });

        function hasDuplicates(array) {
            return new Set(array).size !== array.length;
        }

        function validateForm() {
            var orderDate = document.getElementsByName('OrderDate')[0];
            var supplierID = document.getElementsByName('SupplierID')[0];
            var bookIds = document.getElementsByName('BookID[]');
            let listId = [];
            bookIds.forEach(function (id) {
                listId.push(id.value);
            })
            console.log(listId);
            var quantityReceived = document.getElementsByName('QuantityReceived[]');
            var price = document.getElementsByName('Price[]');

            if (orderDate.value === '') {
                alert('Vui lòng chọn Ngày nhập.');
                orderDate.focus();
                return false;
            }

            if (supplierID.value === '') {
                alert('Vui lòng chọn Nhà cung cấp.');
                supplierID.focus();
                return false;
            }

            if (hasDuplicates(listId)) {
                alert("Mã sách không được trùng nhau!");
                return false;
            }


            for (var i = 0; i < quantityReceived.length; i++) {
                if (quantityReceived[i].value === '' || price[i].value === '') {
                    alert('Vui lòng điền đầy đủ thông tin cho tất cả các sách.');
                    return false;
                }
            }

            if (quantityReceived.length === 0) {
                alert('Vui lòng thêm sách vào hoá đơn.');
                return false;
            }

            return true;
        }

    </script>

@endsection
