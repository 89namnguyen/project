@extends('admin.master')
@section('title', 'Thêm mới tài khoản')
@section('main')

<form action="{{ route('user.store') }}" method="post" role="form">
    @csrf
    <div class="form-group">
        <label for="">Họ tên</label>
        <input class="form-control" name="name" placeholder="Input field">
        @error('name')
        <small>{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Đại chỉ email</label>
        <input class="form-control" name="email" placeholder="Input field">
        @error('email')
        <small>{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Mật khẩu</label>
        <input class="form-control" name="password" placeholder="Input field">
        @error('password')
        <small>{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Xác nhận Mật khẩu</label>
        <input class="form-control" name="re_password" placeholder="Input field">
        @error('re_password')
        <small>{{$message}}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tạo mới</button>
</form>


@stop