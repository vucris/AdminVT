@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Quản lý danh mục</h5>
            <div class="card-body">
              <h5 class="card-title">Danh mục sản phẩm </h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Mã danh mục</th>
                    <th scope="col"><div class="text-center">Hoạt động</div></th>
                  </tr>
                </thead>
                <tbody>
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
                  <tr>
                    <th scope="row">2</th>
                    <td>Nước ép</td>
                    <td>NE01</td>
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
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
