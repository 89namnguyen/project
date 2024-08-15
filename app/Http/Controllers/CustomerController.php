<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
        $data = Customer::paginate();
        $key = request('keyword');

        if ($key) {
            $data = Customer::where('name','LIKE','%'.$key.'%')->paginate();
        }
        return view('admin.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // lấy các trường khác trên form
        $formData = $request->all();
        // thêm image vào mag
        if ($request->img) {
            $img_name = time().'_'. $request->img->getClientOriginalName();
            $request->img->move(public_path('uploads'), $img_name);
        }else{
            $img_name = 'comment-1.jpg';
        }
        $formData['image'] = $img_name;
        if (Customer::create($formData)) {
            return redirect()->route('customer.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('customer.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {   
        //dd ($product);
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // lấy các trường khác trên form
        $formData = $request->all('name');
        
        if ($customer->update($formData)) {
            return redirect()->route('customer.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('customer.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Đã xóa thành công');
    }
}
