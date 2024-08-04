<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $data = Category::paginate(); // phaan trang, mawcj ddinhj laf 15 dong/page
        $key = request('keyword');

        if ($key) {
            $data = Category::where('name','LIKE','%'.$key.'%')->paginate();
        }

        return view('admin.category.index', compact('data'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function edit(Category $cat) {
        // dd ($cat);
        return view('admin.category.edit', compact('cat'));
    }
    
    public function delete(Category $cat) {
        if ($cat->products->count() == 0 && $cat->delete()) {
            return redirect()->route('category.index')->with('success', 'Xóa thành công');
        } else {
            return redirect()->route('category.index')->with('error', 'Không thể xóa danh mục này');
        }
    }

    public function store() {
        request()->validate([
            'name' => 'required|unique:category|min:3|max:100'
        ], [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã tồn tại, chọn tên khác',
            'name.min' => 'Tên danh mục tối thiểu 3 ký tự',
            'name.max' => 'Tên danh mục tối đa 100 ký tự',
        ]);

        $data = request()->all('name');
        if (Category::create($data)) {
            return redirect()->route('category.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('category.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }
    public function update(Category $cat) {
        request()->validate([
            'name' => 'required|min:3|max:100|unique:category,name,'.$cat->id
        ], [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã tồn tại, chọn tên khác',
            'name.min' => 'Tên danh mục tối thiểu 3 ký tự',
            'name.max' => 'Tên danh mục tối đa 100 ký tự',
        ]);

        $data = request()->all('name');
        if ($cat->update($data)) {
            return redirect()->route('category.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('category.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }
}
