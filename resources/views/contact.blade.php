@extends('layout.master')
@section('title', 'contact')

@section('main')

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="map">
                <div class="map__iframe">
                    <iframe src="{{$shop_info->map}}" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="contact__address">
                <div class="row">
                    <div class="contact__slider owl-carousel">
                        @foreach ($contacts as $contact) 
                            <div class="col-lg-11 col-md-11 col-sm-11">
                                <div class="contact__address__item">
                                    <h6>{{$contact->name}}</h6>
                                    <ul>
                                        <li>
                                            <span class="icon_pin_alt"></span>
                                            <p>{{$contact->address}}</p>
                                        </li>
                                        <li><span class="icon_headphones"></span>
                                            <p>{{$contact->email}}</p>
                                        </li>
                                        <li><span class="icon_mail_alt"></span>
                                            <p>{{$contact->phone}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3>Contact With us</h3>
                        <ul>
                            <li>Representatives or Advisors are available:</li>
                            @foreach ($shop_info->h_open as $time) 
                                @if ($time->day == 1)
                                <li>Monday - Friday : {{$time->time_open}}:00 am – {{$time->time_close - 12}}:00 pm</li>  
                                @endif
                                @if ($time->day == 2)
                                <li>Saturday : {{$time->time_open}}:00 am – {{$time->time_close - 12}}:00 pm</li>  
                                @endif
                                @if ($time->day == 3)
                                <li>Sunday : {{$time->time_open}}:00 am – {{$time->time_close - 12}}:00 pm</li>  
                                @endif
                            @endforeach
                        </ul>
                        <img src="img/cake-piece.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Us</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->



@stop()