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
        $chuoi = "bai tap kiem tra ky tu trong chuoi tttt";
        //viết tại đây:
        // vòng lặp for
        for ($i = 0; $i < strlen($chuoi); $i++) {
            if ($chuoi[$i] == 't') { // kiểm tra kí tự t trong chuỗi
                $count_t++; // nếu kí tự i là t thì , biến count tăng lên 1
            }
        }

        // echo "Số ký tự 't' trong chuỗi là: $count_t";


        //Bài 2: viết chương trình in ra kết quả giá sản phẩm dùng switch - case
        // Cam: 20, Bưởi: 30, Táo: 40, Xoài: 15, Ổi: 25
        $product_name = 'Bưởi';
        $product_price = 0;
        //viết tại đây:
        switch ($product_name) { // ten bạn muốn kiểm tra
            case 'Cam':
                $product_price = 20; // biến này lưu trữ giá sp
                break; // thoát vòng lặp
            case 'Bưởi':
                $product_price = 25; // biến này lưu trữ giá sp
                break;
            case 'Táo':
                $product_price = 20; // biến này lưu trữ giá sp
                break;
            case 'Xoài':
                $product_price = 20; // biến này lưu trữ giá sp
                break; // thoát vòng lặp
            case 'Ổi':
                $product_price = 20; // biến này lưu trữ giá sp
                break; // thoát vòng lặp
            default:
               break;




        }




        $data['count_t'] = $count_t;
        $data['product_name'] = $product_name;
        $data['product_price'] = $product_price;
        return view('home', ['data' => $data]);
    }

    public function checkPriceOfProduct()
    {
        //
    }
}
