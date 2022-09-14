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
                                <img src="{{asset('assets/img/instagram.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <img src="{{asset('assets/img/Social2.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <img src="{{asset('assets/img/Social3.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
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
                            <a href="{{url('/about_us')}}" class="link d-block">About us</a>
                            <!-- <a href="#" class="link d-block">Blog</a> -->
                            <a href="{{url('/contact_us')}}" class="link d-block">Contact us</a>
                            <a href="#pricing" class="link d-block">Pricing</a>
                            <a href="#feedback" class="link d-block">Testimonials</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box d-flex align-items-center flex-column">
                        <div>
                            <h3 class="footer_title me-lg-5">Support</h3>
                        </div>
                        <div class="links">
                            <a href="{{url('/contact_us')}}" class="link d-block">Help center</a>
                            <a href="{{url('/terms')}}" class="link d-block">Terms of service</a>
                            <a href="#" class="link d-block">Legal</a>
                            <a href="{{url('/terms')}}" class="link d-block">Privacy policy</a>
                            <!-- <a href="#" class="link d-block">Status</a> -->
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