<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rate::paginate();
        $key = request('keyword');

        if ($key) {
            $data = Rate::where('name','LIKE','%'.$key.'%')->paginate();
        }
        return view('admin.rate.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.rate.create');
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
        $formData = $request->all('name');
        // thêm image vào magnr
        
        if (Rate::create($formData)) {
            return redirect()->route('rate.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('rate.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {   
        //dd ($product);
        return view('admin.rate.edit', compact('Rate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        // lấy các trường khác trên form
        $formData = $request->all('name');
        
        if ($rate->update($formData)) {
            return redirect()->route('rate.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('rate.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();
        return redirect()->route('rate.index')->with('success', 'Đã xóa thành công');
    }
}
