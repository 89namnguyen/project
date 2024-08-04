@extends('layout.master')

@section('main')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Product</h1>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
                    <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="images/couch.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between align-items-top">
        <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="uploads/{{$product->image}}" alt="Image" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">{{$product->name}}</h2>
                <h4 class="section-title">Giá {{$product->price}}</h4>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto perspiciatis sed adipisci temporibus incidunt deleniti unde ipsum animi? Labore incidunt modi amet qui mollitia possimus illo repudiandae tempore accusantium. Explicabo.
                </p>

                <form class="d-flex">
                    <div class="col mr-3">
                        <div class="mb-3">
                            <input type="text" name=""  class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                       
                    </div>
                    <div class="col ml-3">
                    <button type="button" class="btn btn-primary">Add to cart</button>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
            {!! $product->description !!}
            </div>
          
        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Team Section -->
<div class="untree_co-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Our Team</h2>
            </div>
        </div>

        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_1.jpg" class="img-fluid mb-5">
                <h3 clas><a href="#"><span class="">Lawson</span> Arnold</a></h3>
                <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                <p>Separated they live in.
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_2.jpg" class="img-fluid mb-5">

                <h3 clas><a href="#"><span class="">Jeremy</span> Walker</a></h3>
                <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                <p>Separated they live in.
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

            </div>
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_3.jpg" class="img-fluid mb-5">
                <h3 clas><a href="#"><span class="">Patrik</span> White</a></h3>
                <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                <p>Separated they live in.
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_4.jpg" class="img-fluid mb-5">

                <h3 clas><a href="#"><span class="">Kathryn</span> Ryan</a></h3>
                <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                <p>Separated they live in.
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>


            </div>
            <!-- End Column 4 -->



        </div>
    </div>
</div>
<!-- End Team Section -->



<!-- Start Testimonial Slider -->
<div class="testimonial-section before-footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Testimonials</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonial-slider-wrap text-center">

                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                        <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                    </div>

                    <div class="testimonial-slider">

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Maria Jones</h3>
                                            <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END item -->

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Maria Jones</h3>
                                            <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END item -->

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Maria Jones</h3>
                                            <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END item -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonial Slider -->



@stop()