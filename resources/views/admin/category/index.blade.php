@extends('layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        #searchForm .input-group {
            justify-content: flex-end;
            /* Căn chỉnh các phần tử sang bên phải */
            gap: 5px;
            /* Thêm khoảng cách giữa input và button */
        }
    </style>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card p-1">
                <h5 class="card-header">Quản lý danh mục</h5>
                <div class="row justify-content-end mt-3">
                    <div class="col-4">
                        <form id="searchForm">
                            <div class="input-group justify-content-end mb-3">
                                <!-- Input Tìm kiếm -->
                                <input type="text" id="search" name="key_word" placeholder="Tìm tên danh mục"
                                    class="form-control" aria-label="Tìm kiếm" aria-describedby="inputGroup-sizing-default">
                                <!-- Nút tìm kiếm -->
                                <button type="button" id="searchButton" class="btn btn-primary">Tìm</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="d-flex justify-content-end">
                    <div class=""><a href="{{ route('admin.shop.category.create') }}" type="button"
                            class="btn btn-success">Thêm</a></div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th><input id="selectAll" type="checkbox" onclick="selectAllCheckboxes()"></th>
                            <th scope="col">STT</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Mã danh mục</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">
                                <div class="text-center">Hoạt động</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $key)
                            <tr>
                                <th> <input type="checkbox" name="ids[]" class="check-item" name="ids[]"
                                        value="{{ $key->id }}">
                                </th>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $key->name }}</td>
                                <td>{{ $key->code }}</td>
                                <td>
                                    <img src="{{ asset($key->image) }}" alt="Image" width="85" height="85">
                                </td>
                                <td>TC01</td>
                                <td>
                                    <div class="text-center">
                                        <a href="{{ route('admin.shop.category.edit', $key->id) }}">
                                            <button style="border: none; color:rgb(0, 162, 255)">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('admin.shop.category.destroy', $key->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none; color:rgb(250, 35, 35)">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-outline-danger" onclick="deleteSelectedItems()">Xóa Danh
                        Mục</button>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // thông báo
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "500",
            "showEasing": "swing",
            "hideEasing": "linear",
        }
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
    <script>
        document.getElementById('searchButton').onclick = function() {
            // Lấy giá trị từ input tìm kiếm
            var searchTerm = document.getElementById('search').value.trim();
            // Kiểm tra nếu có giá trị tìm kiếm
            if (searchTerm) {
                // Thực hiện tìm kiếm và thay đổi URL
                window.location.href = '/admin/shop/getListCategory?key_word=' + encodeURIComponent(searchTerm);
            } else {
                // Nếu không có từ khóa, reset và hiển thị tất cả danh mục
                window.location.href = '/admin/shop/getListCategory'; // Quay lại tất cả danh mục
            }
        };

        // Hàm xử lý chọn tất cả checkbox
        function selectAllCheckboxes() {
            var isChecked = document.getElementById("selectAll").checked;
            var checkboxes = document.querySelectorAll(".check-item");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = isChecked;
            });
        }

        // Hàm xử lý xóa các danh mục đã chọn
        function deleteSelectedItems() {
            var selectedItems = [];
            var checkboxes = document.querySelectorAll(".check-item:checked");
            // Thu thập tất cả ID từ các checkbox được chọn
            checkboxes.forEach(function(checkbox) {
                selectedItems.push(checkbox.value);
            });

            if (selectedItems.length > 0) {
                // Hiển thị SweetAlert2 để xác nhận
                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: "Bạn sẽ không thể khôi phục các danh mục đã xóa!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Có, xóa!',
                    cancelButtonText: 'Không, hủy!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Gửi yêu cầu AJAX tới server
                        $.ajax({
                            url: "{{ route('admin.shop.category.deleteAll') }}",
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                            },
                            data: {
                                ids: selectedItems
                            },
                            success: function(response) {
                                toastr.success(response.message); // Hiển thị thông báo thành công
                                location.reload(); // Reload lại trang sau khi xóa thành công
                            },
                            error: function(xhr) {
                                toastr.error("Có lỗi xảy ra. Vui lòng thử lại!"); // Thông báo lỗi
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Đã hủy!',
                            'Danh mục không bị xóa.',
                            'error'
                        )
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Vui lòng chọn ít nhất một danh mục để xóa.',
                });
            }
        }
    </script>
@endsection
