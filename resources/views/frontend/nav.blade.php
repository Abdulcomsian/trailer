<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- img -->
                <img src="{{asset('assets/img/menu.png') }}" alt="menu">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Home           About           Trailer          Pricing           Contact -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-3 active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="{{url('/about_us')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="{{url('/#pricing')}}">Trailer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="{{url('/#pricing')}}">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="{{url('/contact_us')}}">Contact</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center centerMobile">
                    @guest
                    <a href="#" class="btn btn-text"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    <a href="#" class="me-3 btn btn_yellow"   data-bs-toggle="modal" data-bs-target="#ragisterModel">Register</a> 
                    @else
                        @php $arr = explode(' ',trim(Auth::user()->name)); @endphp
                        <p style="color: #fff; margin: 3px 7px 0px 0px;">Welcome {{$arr[0]}} </p>
                    <a href="#"><img src="{{asset('assets/img/setting.png') }}" alt="setting"></a>
                    @endif
                </form>
            </div>
        </div>
    </nav>