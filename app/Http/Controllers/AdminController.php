<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('error', 'Có lỗi, vui lòng thử lại');
    }

    public function checkLogin(Request $request)
    {
        $formData = $request->all('email', 'password');

        $check = auth()->attempt($formData);
        if ($check) {
            return redirect()->route('admin.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('admin.login')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }
}
