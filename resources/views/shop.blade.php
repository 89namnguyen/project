@extends('layout.master')

@section('main')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title">Danh mục</h4>
                        <!-- Hover added -->
                        <div class="list-group">
                            @foreach($cates as $cate)
                            <a href="{{ route('shop', $cate->id) }}" class="list-group-item list-group-item-action">{{$cate->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card text-start">
                  <div class="card-body">
                    <h4 class="card-title"> {{$cat->name}}</h4>
                    <div class="row">

@foreach($products as $tu)
<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
    <a class="product-item" href="{{ route('product', $tu->id) }}">
        <img src="uploads/{{ $tu->image }}" class="img-fluid product-thumbnail">
        <h3 class="product-title">{{ $tu->name }}</h3>
        <strong class="product-price">{{ $tu->price }} vnđ</strong>

        <span class="icon-cross">
            <img src="images/cross.svg" class="img-fluid">
        </span>
    </a>
</div>
<!-- End Column 2 -->
@endforeach

</div>
                  </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

@stop()