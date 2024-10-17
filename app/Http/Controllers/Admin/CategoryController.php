<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListCategory(Request $request) {
        $data = [];
        return view('admin.category.index', ['data' => $data]);
    }
}
