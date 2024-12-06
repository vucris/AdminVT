@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <title>Thêm mới danh mục</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: auto;
                    padding: auto;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                h1 {
                    font-size: 24px;
                    color: #333;
                    margin-bottom: 20px;
                    text-align: center;
                }

                .form-group {
                    margin-bottom: 15px;
                }

                .form-group label {
                    font-weight: bold;
                    display: block;
                    margin-bottom: 5px;
                }

                .form-group input[type="text"],
                .form-group input[type="number"],
                .form-group input[type="file"] {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                    transition: border-color 0.3s, box-shadow 0.3s;
                }

                .form-group input[type="text"]:focus,
                .form-group input[type="number"]:focus,
                .form-group input[type="file"]:focus {
                    border-color: #067437;
                    box-shadow: 0 0 5px rgba(6, 116, 55, 0.5);
                    outline: none;
                }

                .form-group input[type="checkbox"] {
                    margin-right: 5px;
                    transform: scale(1.2);
                    cursor: pointer;
                }

                .form-group label span {
                    color: red;
                }

                .buttons {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 20px;
                }

                button {
                    padding: 10px 20px;
                    font-size: 16px;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: background-color 0.3s, transform 0.2s;
                }

                .btn-reset {
                    background-color: #f0ad4e;
                }

                .btn-save {
                    background-color: #067437;
                }

                button:hover {
                    opacity: 0.9;
                }

                button:active {
                    transform: scale(0.98);
                }


                .back-btn {
                    margin-block-end: 50px;
                }

                a.btn {
                    transition: background-color 0.3s, transform 0.2s;
                }

                a.btn:hover {
                    background-color: #b3b3b3;
                    /* Màu xám đậm hơn khi hover */
                    transform: scale(1.05);
                    /* Hiệu ứng phóng to nhẹ */
                }
            </style>
            </head>
            <body>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <h1><b>Thêm mới danh mục</b></h1>
                    <a href="{{ route('admin.shop.category.index') }}" class="btn btn-secondary"
                        style="background-color: #ccc; color: black; padding: 5px 5px; text-decoration: none; border-radius: 5px; display: flex; align-items: center;">
                        <i class="fa-solid fa-arrow-left" style="margin-right: 8px;"></i> Quay lại
                    </a>
                </div>
                <form action="{{ route('admin.shop.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên <span style="color: red;">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Nhập tên danh mục" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Mã danh mục <span style="color: red;">*</span></label>
                        <input type="text" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Thứ tự <span style="color: red;">*</span></label>
                        <input type="number" id="order" name="sort" min="0" value="0" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <input type="file" name="image" class="form-control" accept="image/*"
                            onchange="previewImage(event)" required>
                        <!-- Thẻ hiển thị ảnh -->
                        <img id="preview" src="#" alt="Preview"
                            style="max-width: 100%; max-height: 200px; display: none; margin-top: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <input type="checkbox" id="status" value="1" name="status"> Kích hoạt
                    </div>
                    <div class="buttons">
                        <button type="reset" class="btn-reset">Làm mới</button>
                        <button type="submit" class="btn-save">Lưu</button>
                    </div>
                </form>
                <script>
                    function previewImage(event) {
                        const input = event.target; // Lấy input file
                        const preview = document.getElementById('preview'); // Lấy thẻ <img> hiện preview
                        // Kiểm tra nếu người dùng chọn file
                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            // Khi file được đọc xong
                            reader.onload = function(e) {
                                preview.src = e.target.result; // Gán URL ảnh vào thẻ <img>
                                preview.style.display = 'block'; // Hiển thị thẻ <img>
                            };
                            reader.readAsDataURL(input.files[0]); // Đọc file và chuyển đổi sang URL
                        }
                    }
                </script>
            </body>
            </html>
        </div>
    </div>
@endsection
