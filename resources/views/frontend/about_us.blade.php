<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailer | Home</title>

    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome 5 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css') }}">
</head>

<body>

     <!-- navbar -->
     @include('layouts.Frontend.nav')

    <div class="hero_div about_us">
        <div class="container">
            <div class="about_hero">
                <h1 class="hero_heading">
                    About <span class="text_yellow">Us</span>
                </h1>
            </div>
        </div>
    </div>


    <div class="about_section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_text text-start">
                        <h2 class="section_title">About Us</h2>
                        <p class="section_para text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                            repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                            accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                            reprehenderit?</p>
                        <p class="section_para text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                            repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                            accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                            reprehenderit?</p>
                        <p class="list mb-3 mt-4">
                            <!-- <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span>
                        </p>
                        <p class="list mb-3">
                            <!-- <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span>
                        </p>
                        <p class="list mb-3">
                            <!-- <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span>
                        </p>
                        <a href="#" class="btn btn_yellow mt-3">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_img">
                        <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="about_img">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section_5 counters">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="22"
                                data-purecounter-duration="2" data-purecounter-once="true">22</span>+</h3>
                        <p>Equipments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="4000"
                                data-purecounter-duration="2" data-purecounter-once="true">4000</span>+</h3>
                        <p>happy Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="5"
                                data-purecounter-duration="2" data-purecounter-once="true">5</span> Years</h3>
                        <p>Service</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="8000"
                                data-purecounter-duration="2" data-purecounter-once="true">8000</span>+</h3>
                        <p> Total users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our_blog d-none">
        <div class="container">
            <h2 class="section_title my-b text-center">Our <span class="text_yellow">Blog</span></h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog_box shadow p-4 rounded bg-white mt-5">
                        <div class="blog_img">
                            <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="blog_img">
                        </div>
                        <div class="blog_text">
                            <h3 class="blog_heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h3>
                            <p class="blog_para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                                repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                                accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                                reprehenderit?</p>
                            <a href="#" class="btn btn_yellow mt-3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_box shadow p-4 rounded bg-white mt-5">
                        <div class="blog_img">
                            <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="blog_img">
                        </div>
                        <div class="blog_text">
                            <h3 class="blog_heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h3>
                            <p class="blog_para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                                repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                                accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                                reprehenderit?</p>
                            <a href="#" class="btn btn_yellow mt-3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_box shadow p-4 rounded bg-white mt-5">
                        <div class="blog_img">
                            <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="blog_img">
                        </div>
                        <div class="blog_text">
                            <h3 class="blog_heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h3>
                            <p class="blog_para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                                repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                                accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                                reprehenderit?</p>
                            <a href="#" class="btn btn_yellow mt-3">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- include footer -->
   @include('layouts.Frontend.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="{{asset('assets/js/purecounter.js') }}"></script>
</body>

</html>