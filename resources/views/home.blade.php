@extends('layout.master')
@section('title', 'home')

@Section('main')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Making your life sweeter one bite at a time!</h2>
                                <a href="#" class="primary-btn">Our cakes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Making your life sweeter one bite at a time!</h2>
                                <a href="#" class="primary-btn">Our cakes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
<!-- About Section Begin -->
   <section class="about spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-6 col-md-6">
                   <div class="about__text">
                       <div class="section-title">
                           <span>About {{$shop_info->name}}</span>
                           <h2>Cakes and bakes from the house of Queens!</h2>
                       </div>
                       <p>The "Cake Shop" is a Jordanian Brand that started as a small family business. The owners are
                       Dr. Iyad Sultan and Dr. Sereen Sharabati, supported by a staff of 80 employees.</p>
                   </div>
               </div>
               <div class="col-lg-6 col-md-6">
                   <div class="about__bar">
                       <div class="about__bar__item">
                           <p>Cake design</p>
                           <div id="bar1" class="barfiller">
                               <div class="tipWrap"><span class="tip"></span></div>
                               <span class="fill" data-percentage="95"></span>
                           </div>
                       </div>
                       <div class="about__bar__item">
                           <p>Cake Class</p>
                           <div id="bar2" class="barfiller">
                               <div class="tipWrap"><span class="tip"></span></div>
                               <span class="fill" data-percentage="80"></span>
                           </div>
                       </div>
                       <div class="about__bar__item">
                           <p>Cake Recipes</p>
                           <div id="bar3" class="barfiller">
                               <div class="tipWrap"><span class="tip"></span></div>
                               <span class="fill" data-percentage="90"></span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- About Section End -->

   <!-- Categories Section Begin -->
   <div class="categories">
       <div class="container">
           <div class="row">
               <div class="categories__slider owl-carousel">
                   @foreach ($cats as $cat) 
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <a href="{{route('shop', $cat->id)}}">
                                <span class="{{$cat->icon}}"></span>
                                <h5>{{$cat->name}}</h5>
                            </a>
                        </div>
                    </div>
                    
                   @endforeach
               </div>
           </div>
       </div>
   </div>
   <!-- Categories Section End -->

   <!-- Product Section Begin -->
   <section class="product spad">
       <div class="container">
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
       </div>
   </section>
   <!-- Product Section End -->

   <!-- Class Section Begin -->
   <section class="class spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                   <div class="class__form">
                       <div class="section-title">
                           <span>Class cakes</span>
                           <h2>Made from your <br />own hands</h2>
                       </div>
                       <form action="#">
                           <input type="text" placeholder="Name">
                           <input type="text" placeholder="Phone">
                           <select>
                               <option value="">Studying Class</option>
                               <option value="">Writting Class</option>
                               <option value="">Reading Class</option>
                           </select>
                           <input type="text" placeholder="Type your requirements">
                           <button type="submit" class="site-btn">registration</button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="class__video set-bg" data-setbg="img/class-video.jpg">
               <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1"
               class="play-btn video-popup"><i class="fa fa-play"></i></a>
           </div>
       </div>
   </section>
   <!-- Class Section End -->

   <!-- Team Section Begin -->
   <section class="team spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-7 col-md-7 col-sm-7">
                   <div class="section-title">
                       <span>Our team</span>
                       <h2>Sweet Baker </h2>
                   </div>
               </div>
               <div class="col-lg-5 col-md-5 col-sm-5">
                   <div class="team__btn">
                       <a href="#" class="primary-btn">Join Us</a>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="team__item set-bg" data-setbg="img/team/team-1.jpg">
                       <div class="team__item__text">
                           <h6>Randy Butler</h6>
                           <span>Decorater</span>
                           <div class="team__item__social">
                               <a href="#"><i class="fa fa-facebook"></i></a>
                               <a href="#"><i class="fa fa-twitter"></i></a>
                               <a href="#"><i class="fa fa-instagram"></i></a>
                               <a href="#"><i class="fa fa-youtube-play"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="team__item set-bg" data-setbg="img/team/team-2.jpg">
                       <div class="team__item__text">
                           <h6>Randy Butler</h6>
                           <span>Decorater</span>
                           <div class="team__item__social">
                               <a href="#"><i class="fa fa-facebook"></i></a>
                               <a href="#"><i class="fa fa-twitter"></i></a>
                               <a href="#"><i class="fa fa-instagram"></i></a>
                               <a href="#"><i class="fa fa-youtube-play"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="team__item set-bg" data-setbg="img/team/team-3.jpg">
                       <div class="team__item__text">
                           <h6>Randy Butler</h6>
                           <span>Decorater</span>
                           <div class="team__item__social">
                               <a href="#"><i class="fa fa-facebook"></i></a>
                               <a href="#"><i class="fa fa-twitter"></i></a>
                               <a href="#"><i class="fa fa-instagram"></i></a>
                               <a href="#"><i class="fa fa-youtube-play"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="team__item set-bg" data-setbg="img/team/team-4.jpg">
                       <div class="team__item__text">
                           <h6>Randy Butler</h6>
                           <span>Decorater</span>
                           <div class="team__item__social">
                               <a href="#"><i class="fa fa-facebook"></i></a>
                               <a href="#"><i class="fa fa-twitter"></i></a>
                               <a href="#"><i class="fa fa-instagram"></i></a>
                               <a href="#"><i class="fa fa-youtube-play"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Team Section End -->

   <!-- Testimonial Section Begin -->
   <section class="testimonial spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 text-center">
                   <div class="section-title">
                       <span>Testimonial</span>
                       <h2>Our client say</h2>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="testimonial__slider owl-carousel">
                  @foreach ($rates as $rate) 
                     <div class="col-lg-6">
                         <div class="testimonial__item">
                             <div class="testimonial__author">
                                 <div class="testimonial__author__pic">
                                     <img src="uploads/{{$rate->image}}" alt="">
                                 </div>
                                 <div class="testimonial__author__text">
                                     <h5>{{$rate->customer->name}}</h5>
                                     <span>{{$rate->customer->address}}</span>
                                 </div>
                             </div>
                             <div class="rating">
                                 <span class="icon_star"></span>
                                 <span class="icon_star"></span>
                                 <span class="icon_star"></span>
                                 <span class="icon_star"></span>
                                 <span class="icon_star"></span>
                             </div>
                             <p>{{$rate->content}}</p>
                         </div>
                     </div>
                  @endforeach
               </div>
           </div>
       </div>
   </section>
   <!-- Testimonial Section End -->

   <!-- Instagram Section Begin -->
   <section class="instagram spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-4 p-0">
                   <div class="instagram__text">
                       <div class="section-title">
                           <span>Follow us on instagram</span>
                           <h2>Sweet moments are saved as memories.</h2>
                       </div>
                       <h5><i class="fa fa-instagram"></i> @sweetcake</h5>
                   </div>
               </div>
               <div class="col-lg-8">
                   <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                           <div class="instagram__pic">
                               <img src="img/instagram/instagram-1.jpg" alt="">
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                           <div class="instagram__pic middle__pic">
                               <img src="img/instagram/instagram-2.jpg" alt="">
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                           <div class="instagram__pic">
                               <img src="img/instagram/instagram-3.jpg" alt="">
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                           <div class="instagram__pic">
                               <img src="img/instagram/instagram-4.jpg" alt="">
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                           <div class="instagram__pic middle__pic">
                               <img src="img/instagram/instagram-5.jpg" alt="">
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                           <div class="instagram__pic">
                               <img src="img/instagram/instagram-3.jpg" alt="">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Instagram Section End -->

   <!-- Map Begin -->
   <div class="map">
       <div class="container">
           <div class="row">
            <div class="col-lg-1 col-md-7">
            </div>
            <div class="col-lg-4 col-md-7">
                <div class="map__inner">
                    <h6>{{$shop_info->name}}</h6>
                    <ul>
                        <li>{{$shop_info->address}}</li>
                        <li>{{$shop_info->email}}</li>
                        <li>{{$shop_info->phone}}</li>
                    </ul>
                </div>
            </div>
           </div>
       </div>
       <div class="map__iframe">
        <iframe src="{{$shop_info->map}}" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        
    </div>
   </div>
   <!-- Map End -->

   @stop