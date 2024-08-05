@extends('admin.master')
@section('title', 'Quản lý danh mục')
@section('main')

<form action="" method="GET" class="form-inline" role="form">
    <div class="form-group">
        <input class="form-control" name="keyword" placeholder="Input field">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{ route('product.create') }}" class="btn btn-danger"><i class="fa fa-plus"></i> Thêm mới</a>
</form>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Title</th>
            <th>Lời mở đầu</th>
            <th>Ảnh nền</th>
            <th>Người đăng</th>
            <th>Nội dung</th>
            <th>Ảnh</th>
            <th>Ngày đăng</th>
            <th>Lượt xem</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $object)
        <tr>
            <td>{{$object->id}}</td>
            <td style="width: 100px; ">{{$object->title}}</td>
            <td style="width: 100px; ">{{$object->induction}}</td>
            <td style="width: 80px; ">
                <img src="{{ url('uploads') }}/{{$object->image_title}}" width="80">
            </td>
            <td style="width: 100px">{{$object->custom->name}}</td>
            <td>{{$object->content}}</td>
            <td>
                <img src="{{ url('uploads') }}/{{$object->image}}" width="80">
            </td>
            <td  style="width: 100px">{{$object->date}}</td>
            <td  style="width: 80px">{{$object->view}}</td>
            <td class="text-right" style="width: 150px;">
                <form action="{{ route('blog.destroy', $object->id) }}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{ route('blog.edit', $object->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop