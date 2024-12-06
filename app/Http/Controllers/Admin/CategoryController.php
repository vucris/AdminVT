<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListCategory(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ query string
        $keyWord = $request->get('key_word');
        // Nếu có từ khóa tìm kiếm, thực hiện lọc danh mục
        if ($keyWord) {
            $data = Category::where('name', 'LIKE', "%{$keyWord}%")
                ->orderBy('id')
                ->paginate(10);
        } else {
            // Nếu không có từ khóa, lấy tất cả danh mục
            $data = Category::orderBy('id')->paginate(10);
        }
        return view('admin.category.index', ['data' => $data]);
    }
    public function createCategory(Request $request)
    {
        return view('admin.category.create');
    }
    public function storeCategory(Request $request) //tạo danh mục
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:categories,code',
            'sort' => 'integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'status' => $data["status"] ?? ""
        ]);
        // Khởi tạo biến $imagePath
        $imagePath = null;
        // Kiểm tra xem có file ảnh không
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/category/'; // Đường dẫn lưu trong public
            $file->move(public_path($path), $filename);
            // Lưu đường dẫn đầy đủ vào $imagePath
            $imagePath = $path . $filename;
        }
        Category::create([
            'name' => $request->name,
            'code' => $request->code,
            'image' => $imagePath,
            'status' => $request->status ?? 0,
            'sort' => $request->sort,
        ]);
        return redirect()->route('admin.shop.category.index')->with('success', 'Danh mục đã được tạo.');
    }
    public function editCategory(Request $request, $id)
    { // edit danh mục
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function uploadCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:categories,code,' . $id,
            'sort' => 'integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'status' => 'nullable|boolean',
        ]);
        // Lưu ảnh nếu có
        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
            $file = $request->file('image');
            $path = 'uploads/category/';
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $filename);
            $category->image = $path . $filename;
        }
        // Cập nhật dữ liệu
        $category->update([
            'name' => $request->name,
            'code' => $request->code,
            'sort' => $request->sort,
            'status' => $request->status ?? 0,
            'image' => $category->image,
        ]);
        return redirect()->route('admin.shop.category.index')->with('success', 'Cập nhật danh mục thành công.');
    }
    // xóa danh mục
    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        // Xóa hình ảnh liên quan nếu có
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }
        $category->delete();
        return redirect()->route('admin.shop.category.index')->with('success', 'Danh mục đã được xóa thành công!');
    }


    public function deleteAll(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids) {
            $idsArray = $ids;
            // Lấy các danh mục và xóa hình ảnh nếu có
            $categories = Category::whereIn('id', $idsArray)->get();
            foreach ($categories as $category) {
                if ($category->image && file_exists(public_path($category->image))) {
                    unlink(public_path($category->image));
                }
            }
            // Xóa danh mục
            Category::whereIn('id', $idsArray)->delete();
            return response()->json(['message' => 'Xóa danh mục thành công!']);
        }
        return response()->json(['message' => 'Không có danh mục nào được chọn để xóa!'], 400);
    }
}
