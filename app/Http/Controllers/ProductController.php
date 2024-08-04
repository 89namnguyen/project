<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::paginate();
        $key = request('keyword');

        if ($key) {
            $data = Product::where('name','LIKE','%'.$key.'%')->paginate();
        }
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::paginate();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dump($request->img);
        // lấy tên file ảnh 
        if ($request->img) {
            $img_name = $request->img->getClientOriginalName();
            $request->img->move(public_path('uploads'), $img_name);
        }else{
            $img_name = 'default.png';
        }
       
        // upload ảnh vào thư mục public/uploads
        

        // lấy các trường khác trên form
        $formData = $request->all('name','price','sale_price','category_id','description');
        // thêm image vào magnr
        $formData['image'] = $img_name;
        
        if (Product::create($formData)) {
            return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('product.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        //dd ($product);
        $cats = Category::paginate();
        return view('admin.product.edit', compact('cats','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $img_name = $product->image;
        // upload ảnh vào thư mục public/uploads
        if ($request->has('img')) {
            $img_name = $request->img->getClientOriginalName();
            $request->img->move(public_path('uploads'), $img_name);
        }
        

        // lấy các trường khác trên form
        $formData = $request->all('name','price','sale_price','category_id','description');
        // thêm image vào magnr
        $formData['image'] = $img_name;
        
        if ($product->update($formData)) {
            return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('product.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Đã xóa thành công');
    }
}
