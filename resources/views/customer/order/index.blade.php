@extends('admin.master')
@section('title', 'Quản lý danh mục')
@section('main')

<form action="" method="GET" class="form-inline" role="form">

    <div class="form-group">
        <input class="form-control" name="keyword" placeholder="Input field">
    </div>


    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="/admin/category/create" class="btn btn-danger"><i class="fa fa-plus"></i> Thêm mới</a>
</form>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $object)
        <tr>
            <td>{{$object->id}}</td>
            <td>{{$object->name}}</td>
            <td class="text-right">
                <a href="{{ route('category.edit', $object->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>  Sửa</a>
                <a href="{{ route('category.delete', $object->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop