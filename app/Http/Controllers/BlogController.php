<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Customer;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::paginate();
        $key = request('keyword');

        if ($key) {
            $data = Blog::where('name','LIKE','%'.$key.'%')->paginate();
        }
        return view('admin.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        if (BLog::create($formData)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('user.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
         // lấy các trường khác trên form
         $formData = $request->all();
        
         if ($blog->update($formData)) {
             return redirect()->route('blog.index')->with('success', 'Cập nhật thành công');
         } else {
             return redirect()->route('blog.index')->with('error', 'Có lỗi, vui lòng thử lại');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Đã xóa thành công');
    }
}
