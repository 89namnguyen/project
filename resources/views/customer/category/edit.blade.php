@extends('admin.master')
@section('title', 'Sửa danh mục')
@section('main')

<form action="{{ route('category.update', $category->id)}}" method="post" class="form-inline" role="form">
    @csrf @method('PUT')
    <div class="form-group">
        <input class="form-control" value="{{$category->name}}" name="name" placeholder="Input field">
       
    </div>


    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tạo mới</button>
</form>
@error('name')
            <small>{{$message}}</small>
        @enderror

@stop