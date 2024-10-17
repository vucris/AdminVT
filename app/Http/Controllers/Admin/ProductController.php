<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getListProduct(Request $request) {
        $data = [];
        return view('admin.product.index', ['data' => $data]);
    }
}
