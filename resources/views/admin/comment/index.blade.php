@extends('admin.master')
@section('title', 'Bảng đánh giá')
@section('main')

<form action="" method="GET" class="form-inline" role="form">
    <div class="form-group">
        <input class="form-control" name="keyword" placeholder="Input field">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
</form>
<br>
<table class="table table-hover">
    {{-- <i class="fa-solid fa-star"></i>
    <i class="fa-regular fa-star-half-stroke"></i>
    <i class="fa-regular fa-star"></i> --}}
    <thead>
        <tr>
            <th>STT</th>
            <th>Tác giả</th>
            <th>Nội dung</th>
            <th>Ngày</i></th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $object)
        <tr>
            <td><b>{{$object->id}}</b></td>
            <td><b>{{$object->name}}</b></td>
            <td><b>{{$object->content}}</b></td>
            <td><b>{{$object->date}}</b></td>
            <td><b>{{($object->status == '1')?'hiện':'ẩn';}}</b></td>
            <td>
                <a href="{{ route('rate.edit', $object->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Ẩn/Hiện</a>
            </td>  
        </tr>
        <tr class="star">
            <td>Phản hồi</td>
            <td>Tác giả</td>
            <td>Nội dung</td>
            <td>Ngày </td>
            <td>Trạng thái </td>
            <td>
                <a href="{{ route('rate.update', $object->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Ẩn/Hiện</a>
            </td>
        </tr>
        @foreach($data_0 as $object1)
        @if  ($object->id == $object1->comment_id)
        <tr class="star">
            <td></td>
            <td>{{$object1->customer}}</td>
            <td>{{$object1->content}}</td>
            <td>{{$object1->date}}</td>
            <td>{{($object1->status == '1')?'hiện':'ẩn';}}</td>
        </tr>
        @endif
        @endforeach
        @endforeach
    </tbody>
</table>

@stop