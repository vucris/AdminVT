@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <title>Chỉnh sửa danh mục</title>
            <style>
                /* Toàn bộ CSS giữ nguyên từ form create */
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
                 <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <h1><b>Chỉnh Sửa Danh Mục</b></h1>
                    <a href="{{ route('admin.shop.category.index') }}" class="btn btn-secondary"
                        style="background-color: #ccc; color: black; padding: 5px 5px; text-decoration: none; border-radius: 5px; display: flex; align-items: center;">
                        <i class="fa-solid fa-arrow-left" style="margin-right: 8px;"></i> Quay lại
                    </a>
                </div>
            <form action="{{route('admin.shop.category.upload', $category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên <span style="color: red;">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Nhập tên danh mục" required>
                </div>
                <div class="form-group">
                    <label for="code">Mã danh mục <span style="color: red;">*</span></label>
                    <input type="text" id="code" name="code" value="{{ old('code', $category->code) }}" required>
                </div>
                <div class="form-group">
                    <label for="order">Thứ tự <span style="color: red;">*</span></label>
                    <input type="number" id="order" name="sort" min="0" value="{{ old('sort', $category->sort) }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @if ($category->image)
                        <div style="margin-top: 10px;">
                            <img src="{{ asset($category->image) }}" alt="Category Image" style="max-height: 100px;">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <input type="checkbox" id="status" name="status" value="1" {{ old('status', $category->status) == 1 ? 'checked' : '' }}> Kích hoạt
                </div>
                <div class="buttons">
                    <button type="reset" class="btn-reset">Làm mới</button>
                    <button type="submit" class="btn-save">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
