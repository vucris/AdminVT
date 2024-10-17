@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Quản lý sản phẩm</h5>
            <div class="card-body">
              <h5 class="card-title">Danh sách sản phẩm </h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col"><div class="text-center">Hoạt động</div></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Táo</td>
                    <td>TX001</td>
                    <td>Trái cây</td>
                    <td>10</td>
                    <td>15.000</td>
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
                    <th scope="row">1</th>
                    <td>Cam</td>
                    <td>CX001</td>
                    <td>Trái cây</td>
                    <td>6</td>
                    <td>25.000</td>
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
