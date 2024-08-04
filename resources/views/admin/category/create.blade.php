@extends('admin.master')
@section('title', 'Thêm mới danh mục')
@section('main')

<form action="{{route('category.store')}}" method="post" class="form-inline" role="form">
    @csrf
    <div class="form-group">
        <input class="form-control" name="name" placeholder="Input field">
       
    </div>


    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tạo mới</button>
</form>
@error('name')
            <small>{{$message}}</small>
        @enderror

@stop