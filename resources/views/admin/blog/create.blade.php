@extends('admin.master')
@section('title', 'Sửa sản phẩm')
@section('main')

<form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input class="form-control" name="title" placeholder="Input field" >
                @error('title')
                <small>{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="induction">Mô tả</label>

                <textarea name="induction" class="form-control description" rows="3" placeholder="Mô tả"></textarea>
                @error('induction')
                <small>{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Ảnh nền</label>
                <input type="file" class="form-control" name="img_title" style="width: 30%;">
                @error('img_title')
                <small>{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input type="file" class="form-control" name="img" style="width: 30%;">
                    @error('img')
                    <small>{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>

                <textarea name="content" class="form-control description" rows="3" placeholder="Mô tả"></textarea>
                @error('content')
                <small>{{$message}}</small>
                @enderror
            </div>
            
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary" style="witdh:60px; margin-left:20px;"><i class="fa fa-save"></i> Thêm mới</button>
    </div>
</div>

    
</form>


@stops