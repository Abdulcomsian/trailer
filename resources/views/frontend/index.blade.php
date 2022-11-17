@extends('layouts.Frontend.master')
@section('title')
Trailer | Home
@endsection
@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('content')
<div class="hero_div">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- <img src="{{asset('assets/img/hero_Car.png') }}" class="w-100" alt="hero_Car"> -->
                <!-- Swiper -->
                <div class="swiper mySwiper swiper1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset('assets/img/hero_Car.png') }}" class="w-100" alt="hero_Car">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('assets/img/hero_Car.png') }}" class="w-100" alt="hero_Car">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="text">
                    <h1 class="hero_heading">
                        HIRE TRAILER FOR <span class="text_yellow">RENT!</span>
                    </h1>
                    <p class="hero_text text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <form class="header_form mt-5" id="trailor_book" method="GET" action="{{ route('order-trailer') }}">
                        <div class="input mb-5 position-relative">
                            <!-- <input type="text" class="d-block w-100" placeholder="Type of trailer"> -->
                            <select name="trailer_id" id="trailer_id" class="form_control w-100" required>
                                <option value="">Type of trailer</option>
                                @if(count($trailers) > 0)
                                @foreach($trailers as $trailer)
                                <option value="{{$trailer->id}}">{{$trailer->trailer_name}}</option>
                                @endforeach
                                @endif
                            </select>
                            <span class="text-danger name_valid">{{$errors->first('trailer_id')}}</span>
                        </div>

                        <!-- obaid new work commented================================================ -->
                        <!-- <div class="row">
                             <label class="label text-white" >Pick up (Date / Time)</label>
                            <div class="col-lg-6">

                                 <input type="date" name="s_date" class="d-block form_control w-100" min="<?php //echo date("Y-m-d"); ?>"  disabled required>
                                   <span class="text-danger name_valid">{{$errors->first('s_date')}}</span>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="input mb-5 position-relative">
                                    <input type="text" name="start_time" class="d-block timepicker form_control w-100 time " id="disableTimeRangesExample" placeholder="Pickup time" disabled required>
                                    <span class="icon">
                                        <img src="{{asset('assets/img/timer-outline.png') }}" class="w-100" alt="picker">
                                    </span>
                                    <span class="text-danger name_valid">{{$errors->first('start_time')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="label text-white" >Dropoff (Date / Time)</label>
                            <div class="col-lg-6">
                                <input type="date" name="e_date" class="d-block form_control w-100" min="<?php //echo date("Y-m-d"); ?>" disabled required>
                                  <span class="text-danger name_valid">{{$errors->first('e_date')}}</span>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="input mb-5 position-relative">
                                    <input type="text" name="end_time" class="d-block timepicker form_control w-100 time" id="droptimeInput" placeholder="Dropoff time" disabled required>
                                    <span class="icon">
                                        <img src="{{asset('assets/img/timer-outline.png') }}" class="w-100" alt="picker">
                                    </span>
                                    <span class="text-danger name_valid">{{$errors->first('end_time')}}</span>
                                </div>
                            </div>
                        </div> -->


                        <!-- Atif old work uncommented====================== -->
                         <div class="input mb-5 position-relative">
                            <input type="text" name="date" class="d-block form_control w-100" id="datePut" placeholder="Hire Period" required>
                            <span class="icon">
                                <img src="{{asset('assets/img/timer-outline.png') }}" class="w-100" alt="picker">
                            </span>
                            <span class="text-danger name_valid">{{$errors->first('date')}}</span>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="input mb-5 position-relative">
                                    <input type="text" name="start_time" class="d-block timepicker form_control w-100 time " id="disableTimeRangesExample" placeholder="Pickup time" required disabled>
                                    <span class="icon">
                                        <img src="{{asset('assets/img/timer-outline.png') }}" class="w-100" alt="picker">
                                    </span>
                                    <span class="text-danger name_valid">{{$errors->first('start_time')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="input mb-5 position-relative">
                                    <input type="text" name="end_time" class="d-block timepicker form_control w-100 time" id="droptimeInput" placeholder="Dropoff time" required >
                                    <span class="icon">
                                        <img src="{{asset('assets/img/timer-outline.png') }}" class="w-100" alt="picker">
                                    </span>
                                    <span class="text-danger name_valid">{{$errors->first('end_time')}}</span>
                                </div>
                            </div>
                        </div>
                        @guest
                        <a href="#" class="me-3 btn btn_yellow" data-bs-toggle="modal" data-bs-target="#loginModal">Search</a>
                        @else
                        <!-- style="opacity: 0.6;cursor: not-allowed;" -->
                        <button type="submit"  class="me-3 btn btn_yellow" >Search</button>
                        @endguest
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section_2">
    <div class="container">
        <div class="text text-center mx-auto">
            <h2 class="section_title">Things you need <span class="text_yellow">to do</span></h2>
            <p class="section_para mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis a
                interdum
                lacus.</p>
        </div>
        <div class="row px-lg-4 mt-5">
            <div class="col-lg-4">
                <div class="box">
                    <!-- <img src="img/boximg1.png" alt="box"> -->
                    <img src="{{asset('assets/img/boximg1.png') }}" alt="box">
                    <h4 class="box_head">Choose Trailer</h4>
                    <p class="box_p">Lorem ipsum dolor sit amet, consec adipiscing.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box box_2">
                    <!-- <img src="img/boximg2.png" alt="box"> -->
                    <img src="{{asset('assets/img/boximg2.png') }}" alt="box">
                    <h4 class="box_head">Make Payment</h4>
                    <p class="box_p">Lorem ipsum dolor sit amet, consec adipiscing.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box">
                    <!-- <img src="img/boximg3.png" alt="box"> -->
                    <img src="{{asset('assets/img/boximg3.png') }}" alt="box">
                    <h4 class="box_head">Pick Trailer</h4>
                    <p class="box_p">Lorem ipsum dolor sit amet, consec adipiscing.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section_3" id="trailer">
    <div class="container">
        <!-- Swiper -->
        <div class="swiper swiper3 mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="text mb-5 featureText">
                                <h2 class="section_title">Features of <span class="text_yellow">2T</span></h2>
                                <p class="section_para text-start mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Mauris
                                    quis a
                                    interdum
                                    lacus.</p>

                                <p class="list mb-3">
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                                <p class="list mb-3">
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                                <p class="list mb-3">
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                                <p class="list mb-3">
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                            </div>
                            <!-- 2ND -->
                            <div class="text mb-5 featureText d-none">
                                <h2 class="section_title">Features of <span class="text_yellow">2.5T</span></h2>
                                <p class="section_para text-start mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Mauris
                                    quis a
                                    interdum
                                    lacus.</p>

                                <p class="list mb-3">
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                    </span>
                                </p>
                                <p class="list mb-3">
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">amet Lorem ipsum dolor sit
                                    </span>
                                </p>
                                <p class="list mb-3">
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                                <p class="list mb-3">
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem dolor sit
                                        amet</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- <img src="img/section3Img.png" class="img-fluid" alt="img"> -->
                            <!-- <img src="{{asset('assets/img/section3Img.png') }}" class="img-fluid" alt="img"> -->
                            <div class="card_imgs d-flex align-items-center">
                                <div class="card_img img1 flex-column align-items-center">
                                    <img src="{{asset('assets/img/feature_img_1.png') }}" class="img-fluid" alt="img">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="btn btn_book">Book Now</a>
                                    </div>
                                </div>
                                <div class="card_img img2 d-none d-lg-flex flex-column align-items-center absolute">
                                    <img src="{{asset('assets/img/feature_img_2.png') }}" class="img-fluid" alt="img">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="btn btn_book">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="text mb-5">
                                <h2 class="section_title">Features of <span class="text_yellow">2T</span></h2>
                                <p class="section_para text-start mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Mauris
                                    quis a
                                    interdum
                                    lacus.</p>

                                <p class="list mb-3">
                                    <!-- <img src="img/dot.png" alt="dot"> -->
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                                <p class="list mb-3">
                                    <!-- <img src="img/dot.png" alt="dot"> -->
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                                <p class="list mb-3">
                                    <!-- <img src="img/dot.png" alt="dot"> -->
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                                <p class="list mb-3">
                                    <!-- <img src="img/dot.png" alt="dot"> -->
                                    <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                                    <span class="ms-3">Lorem ipsum dolor sit
                                        amet</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- <img src="img/section3Img.png" class="img-fluid" alt="img"> -->
                            <!-- <img src="{{asset('assets/img/section3Img.png') }}" class="img-fluid" alt="img"> -->
                            <div class="card_imgs d-flex align-items-center">
                                <div class="card_img img1 absolute d-none d-lg-flex flex-column align-items-center">
                                    <img src="{{asset('assets/img/feature_img_1.png') }}" class="img-fluid" alt="img">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="btn btn_book">Book Now</a>
                                    </div>
                                </div>
                                <div class="card_img img2 d-flex flex-column align-items-center">
                                    <img src="{{asset('assets/img/feature_img_2.png') }}" class="img-fluid" alt="img">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="btn btn_book">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>

        </div>
    </div>

    <div class="section_5 counters">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="22" data-purecounter-duration="2" data-purecounter-once="true">22</span>+</h3>
                        <p>Equipments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="4000" data-purecounter-duration="2" data-purecounter-once="true">4000</span>+</h3>
                        <p>happy Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="2" data-purecounter-once="true">5</span> Years</h3>
                        <p>Service</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="8000" data-purecounter-duration="2" data-purecounter-once="true">8000</span>+</h3>
                        <p> Total users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section_6" id="pricing">
        <div class="top_head">
            <h2 class="section_title text-white text-center">Pricing for <span class="text_yellow">trailers</span></h2>
        </div>
        <div class="price_table">
            <div class="price_table_head">Price table</div>
            <div class="table_box">
                <div class="row mx-0 borderBottom">
                    <div class="col-lg-6 bg-white">
                        <div class="headbox">2T Trailer</div>
                    </div>
                    <div class="col-lg-6 mobileHide bg-white borderColLeft">
                        <div class="headbox">2.8T Trailer</div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-lg-6 px-0">
                        <div class="priceBox d-flex justify-content-between align-items-center">
                            <p class="m-0"><b>Hours</b></p>
                            <p class="m-0"><b>Price</b></p>
                        </div>
                        <div class="priceBody">
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-none bg-white borderColLeft">
                        <div class="headbox">2.8T Trailer</div>
                    </div>
                    <div class="col-lg-6 px-0">
                        <div class="priceBox d-flex justify-content-between align-items-center">
                            <p class="m-0"><b>Hours</b></p>
                            <p class="m-0"><b>Price</b></p>
                        </div>
                        <div class="priceBody">
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section_7" id="feedback">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text">
                        <h2 class="section_title">What people say <br>
                            <span class="text_yellow">about Us.</span>
                        </h2>
                        <p class="section_para text-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Mauris
                            quis a
                            interdum
                            lacus.</p>
                        <div class="custom_pagination_in">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img">
                        <!-- <img src="img/client_feedback.png" class="w-100" alt="client_feedback"> -->
                        <!-- <img src="{{asset('assets/img/client_feedback.png') }}" class="w-100" alt="client_feedback"> -->
                        <!-- Swiper -->
                        <div class="swiper mySwiper swiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="feedback shadow-sm">
                                        <div class="avatar">
                                            <img src="{{asset('assets/img/avatar.png') }}" alt="avatar png">
                                        </div>
                                        <div class="text">
                                            <p>1Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris
                                                quis a
                                                interdum
                                                lacus.</p>
                                            <h6 class="m-0">1John Doe</h6>
                                            <span class="place">Sydney, Australia</span>
                                        </div>

                                    </div>
                                    <div class="feedback ghost_dev">
                                        <div class="text">
                                            <p>1Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris
                                                quis a
                                                interdum
                                                lacus.</p>
                                            <h6 class="m-0">1John Doe</h6>
                                            <span class="place">Sydney, Australia</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="feedback shadow-sm">
                                        <div class="avatar">
                                            <img src="{{asset('assets/img/avatar.png') }}" alt="avatar png">
                                        </div>
                                        <div class="text">
                                            <p>2Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris
                                                quis a
                                                interdum
                                                lacus.</p>
                                            <h6 class="m-0">2John Doe</h6>
                                            <span class="place">Sydney, Australia</span>
                                        </div>

                                    </div>
                                    <div class="feedback ghost_dev">
                                        <div class="text">
                                            <p>2Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris
                                                quis a
                                                interdum
                                                lacus.</p>
                                            <h6 class="m-0">2John Doe</h6>
                                            <span class="place">Sydney, Australia</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="feedback shadow-sm">
                                        <div class="avatar">
                                            <img src="{{asset('assets/img/avatar.png') }}" alt="avatar png">
                                        </div>
                                        <div class="text">
                                            <p>3Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris
                                                quis a
                                                interdum
                                                lacus.</p>
                                            <h6 class="m-0">3John Doe</h6>
                                            <span class="place">Sydney, Australia</span>
                                        </div>

                                    </div>
                                    <div class="feedback ghost_dev">
                                        <div class="text">
                                            <p>3Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris
                                                quis a
                                                interdum
                                                lacus.</p>
                                            <h6 class="m-0">3John Doe</h6>
                                            <span class="place">Sydney, Australia</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="feedback shadow-sm">
                                        <div class="avatar">
                                            <img src="{{asset('assets/img/avatar.png') }}" alt="avatar png">
                                        </div>
                                        <div class="text">
                                            <p>4Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris
                                                quis a
                                                interdum
                                                lacus.</p>
                                            <h6 class="m-0">4John Doe</h6>
                                            <span class="place">Sydney, Australia</span>
                                        </div>

                                    </div>
                                    <div class="feedback ghost_dev">
                                        <div class="text">
                                            <p>4Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris
                                                quis a
                                                interdum
                                                lacus.</p>
                                            <h6 class="m-0">4John Doe</h6>
                                            <span class="place">Sydney, Australia</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="swiper-slide">
                                <img src="{{asset('assets/img/client_feedback.png') }}" class="w-100" alt="client_feedback">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('assets/img/client_feedback.png') }}" class="w-100" alt="client_feedback">
                            </div> -->
                            </div>
                            <div class="pagination_custom">
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        jQuery(document).ready(function($) {

            $('#model_login').on('submit', function(e) {
                e.preventDefault();
                var datastring = $("#model_login").serialize();
                console.log(datastring);
                $.ajax({
                    url: "{{route('custom-login')}}",
                    type: "POST",
                    data: datastring,
                    dataType: 'json',
                    success: function(result) {
                        console.log(result);
                        if (result.status == "Success" && result.data.login == "loggedin") {
                            if($("#trailer_id").val() !="")
                            {
                                $("#trailor_book").submit();
                            }
                            else{
                                location.reload();
                            }
                            
                        } else if(result.status=="Error"){
                            toastr.error("Incorrect Credentials");
                        }else if(res.status==422){
                            toastr.error("Please Enter Login Credentials");
                        }
                    }
                });
            })
        })
    </script>
    <script type="text/javascript">
        const timeDisabled = (time) => {
        // alert(time) // 12:00 AM
        const stringTime = time.map(String)
        console.log([...stringTime])
        $('#disableTimeRangesExample').timepicker({ 'step': 60, 'disableTimeRanges': [
                   // ['1am', '2am'],
                
                [stringTime[0], stringTime[1]],
                [stringTime[2], stringTime[3]],
                [stringTime[4], stringTime[5]],
                [stringTime[6], stringTime[7]],
                [stringTime[8], stringTime[9]],
                [stringTime[10], stringTime[11]],
           ] });
    }
    // const dropTimeDisabled = (time) => {
    //     const stringTime = time.map(String)
    //     if(stringTime[0] != 'null')
    //     {
    //         $('#droptimeInput').timepicker({ 'disableTimeRanges': [
    //                 //    ['1am', '2am'],
                    
    //                 [stringTime[0], '11:30pm'],
    //                 ['12am', stringTime[1]],
    //         ] });
    //     }
    //     else
    //     {
    //         $('#droptimeInput').timepicker({ 'disableTimeRanges': [
    //                 //    ['1am', '2am'],
                    
    //                 // [stringTime[0], '11:30pm'],
    //                 ['12am', stringTime[1]],
    //         ] });
    //     }
    //     $('#search').css({'opacity':'1', 'cursor':'default'});
    // }
    
    $('.applyBtn').click(function () {
        var c_date;
        setTimeout(() => {
            c_date = $('#datePut').val();
            trailer_id = $('#trailer_id').val();
            if(trailer_id == '')
            {
                toastr.error("Kindly Select Trailer First"); 
                $('#disableTimeRangesExample').attr('disabled', 'disabled');
            }
            else{
                $('#disableTimeRangesExample').removeAttr('disabled', 'disabled');
                $.ajax({
                type: "POST",
                url: "{{ route('check-date') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    'c_date':c_date,
                    'trailer_id':trailer_id,
                } ,
                datatype: "json",
                success: function (data) {
                    if(data.success == true){
                        toastr.success(data.message);
                        timeDisabled([...data.data]);
                        $("input[name='start_time']").removeAttr('disabled');
                    } else {
                        toastr.error(data.message);
                        $("input[name='start_time']").attr('disabled','disabled');
                    }
                    
                    
                },
                error: function (data) {
                    console.log('Error:', data.responseJSON);
                    
                    
                }
            });
            }
        }, 100);
    });


    $('#disableTimeRangesExample').change(function () {
        var c_date= $('#datePut').val();
        var pick_time=$('#disableTimeRangesExample').val();
        let checkam_pm=pick_time.includes("pm") ? 'pm':'am';
        pick_time=pick_time.replace(checkam_pm,"");
        pick_time=pick_time.split(':');
        var date=c_date.split('-');
        console.log(date[0].trim());
        if(date[0].trim()==date[1].trim())
        {
            console.log("here");
            $('#droptimeInput').timepicker({
                     'step': 60,
                    'disableTimeRanges': [
                        ['12am', pick_time[0]+'01'+checkam_pm],
                    ]
                });
        }
        console.log("oute");
        // setTimeout(() => {
        //     c_date = $('#datePut').val();
        //     pick_time = $('#disableTimeRangesExample').val();
        //     trailer_id = $('#trailer_id').val();
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('check-drop-time') }}",
        //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //         data: {
        //             'c_date':c_date,
        //             'pick_time':pick_time,
        //             'trailer_id':trailer_id,
        //         } ,
        //         datatype: "json",
        //         success: function (data) {
        //             // console.log(data);
        //             if(data.success == true){
        //                 dropTimeDisabled([...data.data])
        //             } else {
        //                 dropTimeDisabled([...data.data])
        //             }
                    
                    
        //         },
        //         error: function (data) {
        //             console.log('Error:', data.responseJSON);
                    
                    
        //         }
        //     });
        // }, 100);
    });

    </script>

    <script>
        //     const timeDisabled = (time,pravioustime) => {
        //     const stringTime = time.map(String)
        //     console.log([...stringTime]);
        //     if(pravioustime)
        //     {
        //         $('#disableTimeRangesExample').timepicker({
        //         'step': 60,
        //         'disableTimeRanges': [
        //             ["12:00am", stringTime[0]],
        //         ]
        //        });
        //     }
        //     else{
        //         $('#disableTimeRangesExample').timepicker({
        //          'step': 60,
        //         'disableTimeRanges': [
        //             [stringTime[0], stringTime[1]],
        //             [stringTime[2], stringTime[3]],
        //             [stringTime[4], stringTime[5]],
        //             [stringTime[6], stringTime[7]],
        //             [stringTime[8], stringTime[9]],
        //             [stringTime[10], stringTime[11]],
        //         ]
        //     });
        //     }
               
        // }

        const dropTimeDisabled = (time) => {
            const stringTime = time.map(String)
            console.log(stringTime);
            if (stringTime[0] != 'null') {
                $('#droptimeInput').timepicker({
                     'step': 60,
                    'disableTimeRanges': [
                        [stringTime[0], '11:31pm'],
                        ['12am', stringTime[1]],
                    ]
                });
            } else {
                $('#droptimeInput').timepicker({
                     'step': 60,
                    'disableTimeRanges': [
                        ['12am', stringTime[1]],
                    ]
                });
            }
            $('#search').css({
                'opacity': '1',
                'cursor': 'default'
            });
        }

        //new work here
        // $("#trailer_id").change(function(){
        //     if($(this).val()!="")
        //     {
        //         $("input[name='s_date']").removeAttr('disabled').val("");
        //         $("input[name='e_date']").removeAttr('disabled').val("");
        //         $("input[name='start_time']").removeAttr('disabled').val("");
        //         $("input[name='end_time']").removeAttr('disabled').val("");
        //     }
        //     else{
        //         $("input[name='s_date']").attr('disabled','disabled').val();
        //         $("input[name='e_date']").attr('disabled','disabled').val("");
        //         $("input[name='start_time']").attr('disabled','disabled').val("");
        //         $("input[name='end_time']").attr('disabled','disabled').val("");
        //     }
        // })

        // $("input[name='s_date']").change(function(){
        //      $('#disableTimeRangesExample').val("");
        //     $('#disableTimeRangesExample').timepicker({ 
        //          'step': 60,
        //         'disableTimeRanges': [
        //       ] });
            
        //      $('#droptimeInput').val("");
        //     $('#droptimeInput').timepicker({ 
        //          'step': 60,
        //         'disableTimeRanges': [
        //     ] });
            
        //     $("input[name='e_date']").val("");

        //     var s_date;
        //     var s_date = $(this).val();
        //     var trailer_id = $('#trailer_id').val();
        //      setTimeout(() => {
                
        //         $('#disableTimeRangesExample').removeAttr('disabled', 'disabled');
        //         $.ajax({
        //             type: "POST",
        //             url: "{{ route('check-date1') }}",
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             data: {
        //                 's_date': s_date,
        //                 'trailer_id': trailer_id,
        //             },
        //             datatype: "json",
        //             success: function(data) {
        //                 if (data.success == true) {
        //                     toastr.success(data.message);
        //                      $("input[name='e_date']").attr('max',data.disablednext);
        //                      $("input[name='e_date']").attr('min',data.disabledpravious);
        //                     timeDisabled([...data.data],data.pravioustime);
        //                 } else {
        //                     toastr.error(data.message);
        //                 }

        //             },
        //             error: function(data) {
        //                 console.log('Error:', data.responseJSON);


        //             }
        //         });
        //     }, 100);
        // })


        // $("input[name='e_date']").change(function(){
        //     var e_date;
        //     var trailer_id;
        //     var s_date=$("input[name='s_date']").val();
        //     var pick_time=$("input[name='start_time']").val();
        //      setTimeout(() => {
        //         e_date = $(this).val();
        //         trailer_id = $('#trailer_id').val();
        //         $.ajax({
        //             type: "POST",
        //             url: "{{ route('check-end-date')}}",
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             data: {
        //                 's_date': s_date,
        //                 'e_date':e_date,
        //                 'trailer_id': trailer_id,
        //                 'pick_time':pick_time,
        //             },
        //             datatype: "json",
        //             success: function(data) {
        //                 if (data.success == true) {
        //                     toastr.success(data.message);
        //                     if(data.droptime)
        //                     {
        //                         $('#droptimeInput').timepicker({ 
        //                              'step': 60,
        //                             'disableTimeRanges': [
        //                         ]}); 
        //                     }else{
        //                          dropTimeDisabled([...data.data])
        //                     }
        //                 } else {
        //                     toastr.error(data.message);
        //                 }

        //             },
        //             error: function(data) {
        //                 console.log('Error:', data.responseJSON);


        //             }
        //         });
        //     }, 100);
        // })

        //new work obaid====================================
        //   $('#disableTimeRangesExample').change(function() {
        //     var s_date;
        //     var pick_time;
        //     var trailer_id;
        //     setTimeout(() => {
        //         s_date =  $("input[name='s_date']").val();
        //         pick_time = $(this).val();
        //         trailer_id = $('#trailer_id').val();
        //         $.ajax({
        //             type: "POST",
        //             url: "{{ route('check-drop-time1') }}",
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             data: {
        //                 's_date': s_date,
        //                 'pick_time': pick_time,
        //                 'trailer_id': trailer_id,
        //             },
        //             datatype: "json",
        //             success: function(data) {
        //                  console.log(data);
        //                  $("input[name='e_date']").attr('max',data.disablednext);
        //                 if (data.success == true) {
        //                     dropTimeDisabled([...data.data])
        //                 } else {
        //                     dropTimeDisabled([...data.data])
        //                 }
        //             },
        //             error: function(data) {
        //                 console.log('Error:', data.responseJSON);


        //             }
        //         });
        //     }, 100);

        // });
    </script>
    @endsection