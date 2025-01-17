@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <h1 class="">{{ 'In kết quả bài tập' }}</h1>
        <div class="card">
            <div class="card-header">{{ 'Kết quả' }}</div>
            <div class="card-body">
                <div style="height: 400px">
                    <div>
                        <h3>Bài tập 1: <span style="color: blue">In kết quả đếm ký tự 't'</span></b></h3>
                        <p>Số ký tự t: <b>{{ $du_lieu['count_t']}}</b></p>
                    </div>
                    <div>
                        <h3>Bài tập 2: <span style="color: blue">In kết quả giá theo sản phẩm</span></b></h3>
                        <p>Tên sản phẩm: <b>{{ $du_lieu['product_name']}}</b></p>
                        <p>Giá sản phẩm: <b>{{ $du_lieu['product_price']}}</b></p>
                        <p>{{ $du_lieu['chuoi'] }}</p>
                        <p>{!!$du_lieu['chuoi'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
