<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $count_t = 0;
        // bài 1: viêt chương trình in ra kết quả $count_t kiểm tra xem trong chuỗi $chuoi có bao nhiêu chữ t
        $chuoi = "bai tap kiem tra ky tu trong chuoi";
        //viết tại đây:




        //Bài 2: viết chương trình in ra kết quả giá sản phẩm dùng switch - case
        // Cam: 20, Bưởi: 30, Táo: 40, Xoài: 15, Ổi: 25
        $product_name = '';
        $product_price = 0;
        //viết tại đây:





        $data['count_t'] = $count_t;
        $data['product_name'] = $product_name;
        $data['product_price'] = $product_price;
        return view('home', ['data' => $data]);
    }

    public function checkPriceOfProduct() {
        //
    }
}
