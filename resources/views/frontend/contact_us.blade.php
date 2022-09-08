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

    <!-- only for contact us page -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://preview.colorlib.com/theme/bootstrap/contact-form-02/css/A.style.css.pagespeed.cf.6gH3tK04P8.css">

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css') }}">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                menu
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Home           About           Trailer          Pricing           Contact -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-3 active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">Trailer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center centerMobile">
                    <a href="#" class="btn btn-text">Login</a>
                    <a href="#" class="me-3 btn btn_yellow">Register</a>
                    <a href="#"><img src="{{asset('assets/img/setting.png') }}" alt="setting"></a>
                </form>
            </div>
        </div>
    </nav>

    <div class="hero_div about_us">
        <div class="container">
            <div class="about_hero">
                <h1 class="hero_heading">
                    Contact <span class="text_yellow">Us</span>
                </h1>
            </div>
        </div>
    </div>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Get in touch</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                    </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Full Name</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject">Subject</label>
                                                    <input type="text" class="form-control" name="subject" id="subject"
                                                        placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Message</label>
                                                    <textarea name="message" class="form-control" id="message" cols="30"
                                                        rows="4" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="#" class="btn btn_yellow">Send</a>
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap bg_yellow w-100 p-md-5 p-4">
                                    <h3>Let's get in touch</h3>
                                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Email:</span> <a
                                                    href="/cdn-cgi/l/email-protection#caa3a4aca58ab3a5bfb8b9a3beafe4a9a5a7"><span
                                                        class="__cf_email__"
                                                        data-cfemail="d4bdbab2bb94adbba1a6a7bda0b1fab7bbb9">[email&#160;protected]</span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-globe"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Website</span> <a href="#">yoursite.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box d-flex align-items-center flex-column">
                        <div class="logo">
                            <!-- <img src="img/logo.png" alt="logo"> -->
                            <img src="{{asset('assets/img/logo.png') }}" alt="logo">
                        </div>
                        <div class="social mt-4">
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/instagram.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/Social2.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/Social3.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/Social4.png') }}" alt="instagram">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div
                        class="box d-flex align-items-lg-end align-items-center justify-content-lg-center flex-column pe-lg-5">
                        <h3 class="footer_title">Company</h3>
                        <div class="links">
                            <a href="#" class="link d-block">About us</a>
                            <a href="#" class="link d-block">Blog</a>
                            <a href="#" class="link d-block">Contact us</a>
                            <a href="#" class="link d-block">Pricing</a>
                            <a href="#" class="link d-block">Testimonials</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box d-flex align-items-center flex-column">
                        <div>
                            <h3 class="footer_title me-lg-5">Support</h3>
                        </div>
                        <div class="links">
                            <a href="#" class="link d-block">Help center</a>
                            <a href="#" class="link d-block">Terms of service</a>
                            <a href="#" class="link d-block">Legal</a>
                            <a href="#" class="link d-block">Privacy policy</a>
                            <a href="#" class="link d-block">Status</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box flexmobile pe-lg-5 me-lg-5">
                        <h3 class="footer_title">Stay up to date</h3>
                        <div class="input position-relative">
                            <input type="email" placeholder="Your email address">
                            <span class="icon">
                                <!-- <img src="img/send.png" alt="send"> -->
                                <img src="{{asset('assets/img/send.png') }}" alt="send">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="copyright mb-0">Copyright © 2022 oldmatestrailer. All rights reserved</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="{{asset('assets/js/purecounter.js') }}"></script>
</body>

</html>