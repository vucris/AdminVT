<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListCategory(Request $request) {
        $data = User::paginate();
        return view('admin.category.index', ['data' => $data]);
    }
}
