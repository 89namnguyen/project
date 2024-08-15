@extends('admin.master')
@section('title', 'Sửa sản phẩm')
@section('main')

<form action="{{route('blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input class="form-control" value="{{$blog->title}}" name="title" placeholder="Input field">
                @error('title')
                <small>{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="induction">Mô tả</label>

                <textarea name="induction" class="form-control description" rows="3" placeholder="Mô tả">{{$blog->induction}}</textarea>
                @error('induction')
                <small>{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>

                <textarea name="content" class="form-control description" rows="3" placeholder="Mô tả">{{$blog->content}}</textarea>
                @error('content')
                <small>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Ảnh nền</label>
                <input type="file" class="form-control" name="img_title">
                @error('img_title')
                <small>{{$message}}</small>
                @enderror
                <img src="{{ url('uploads') }}/{{$blog->image_title}}" width="200px">
            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" name="img">
                @error('img')
                <small>{{$message}}</small>
                @enderror
                <img src="{{ url('uploads') }}/{{$blog->image}}" width="200px">
            </div>
            
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary" style="witdh:60px;margin-left: 50%;"><i class="fa fa-save"></i> Sửa</button>
    </div>
</div>

    
</form>


@stop