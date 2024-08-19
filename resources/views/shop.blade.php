@extends('layout.master')
@section('title', 'shop')
@section('main')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="shop__option__search">
                            <form action="#">
                                <select>
                                    <option value="">Categories</option>
                                    @foreach($cates as $cate)
                                        <option value="{{$cate->id}}" name="id"><a href="{{route('shop',$cate->id) }}">{{$cate->name}}</a></option>
                                    @endforeach
                                </select>
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="shop__option__right">
                            <select>
                                <option value="">Default sorting</option>
                                <option value="">A to Z</option>
                                <option value="">1 - 8</option>
                                <option value="">Name</option>
                            </select>
                            <a href="#"><i class="fa fa-list"></i></a>
                            <a href="#"><i class="fa fa-reorder"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product) 
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="uploads/{{$product->image}}">
                            <div class="product__label">
                                <span>{{$product->cat->name}}</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$product->name}}</a></h6>
                            <div class="product__item__price">
                                @if ($product->sale_price > 0)
                                    <b><span>$</span> {{number_format($product->sale_price)}}</b>
                                    <s><span>$</span> {{number_format($product->price)}}</s>
                                @else
                                    <span>$</span> {{number_format($product->price)}}
                                @endif
                            </div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
            <div class="shop__last__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><span class="arrow_carrot-right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__last__text">
                            <p>Showing 1-9 of 10 results</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->


{{-- 
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
</div> --}}

@stop()