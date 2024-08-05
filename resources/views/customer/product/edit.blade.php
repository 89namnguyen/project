@extends('admin.master')
@section('title', 'Sửa sản phẩm')
@section('main')

<form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input class="form-control" value="{{$product->name}}" name="name" placeholder="Input field">
                @error('name')
                <small>{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả sản phẩm</label>

                <textarea name="description" class="form-control description" rows="3" placeholder="Mô tả">{{$product->description}}</textarea>
                @error('description')
                <small>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tạo mới</button>
        <hr />
            <div class="form-group">
                <label for="">Danh mục</label>

                <select name="category_id" class="form-control">
                    <option value="">Chọn một---</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                    @endforeach
                </select>

                @error('category_id')
                <small>{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Giá sản phẩm</label>
                <input class="form-control" value="{{$product->price}}" name="price" placeholder="Input field">
                @error('price')
                <small>{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Giá khuyến mãi</label>
                <input class="form-control" value="{{$product->dale_price}}" name="sale_price" placeholder="Input field">
                @error('sale_price')
                <small>{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" class="form-control" name="img">
                @error('img')
                <small>{{$message}}</small>
                @enderror
                <img src="{{ url('uploads') }}/{{$product->image}}" width="100%">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tạo mới</button>
        </div>
    </div>



    
</form>


@stop