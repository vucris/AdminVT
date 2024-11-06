@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card p-1">
                <h5 class="card-header">Quản lý danh mục</h5>
                    <div class="row justify-content-end  mt-3">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <input type="text" placeholder="Tìm tên danh mục" class="form-control"
                                    aria-label="Tìm kiếm" aria-describedby="inputGroup-sizing-default">
                                <button type="button" class="btn btn-primary">Tìm</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class=""><button type="button" class="btn btn-success">Tạo mới</button></div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Mã danh mục</th>
                                <th scope="col">
                                    <div class="text-center">Hoạt động</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Trái cây</td>
                                    <td>TC01</td>
                                    <td>
                                        <div class="text-center">
                                            <button style="border: none; color:rgb(0, 162, 255)">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button style="border: none; color:rgb(250, 35, 35)">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-felx justify-content-end">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
