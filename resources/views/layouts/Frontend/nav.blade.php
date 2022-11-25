<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('assets/img/logo.png') }}" alt="logo">
        </a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- img -->
            <img src="{{asset('assets/img/menu.png') }}" alt="menu">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Home           About           Trailer          Pricing           Contact -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @if(Route::is('landing-page'))
                    <a class="nav-link mx-3 active" href="{{url('/')}}">Home
                        @else
                        <a class="nav-link mx-3" href="{{url('/')}}">Home
                            @endif
                        </a>
                </li>
                <li class="nav-item">
                    @if(Route::is('about-us'))
                    <a class="nav-link mx-3 active" href="{{url('/about_us')}}">About
                        @else
                        <a class="nav-link mx-3" href="{{url('/about_us')}}">About
                            @endif
                        </a>
                </li>
                <li class="nav-item">
                    <!-- @if(Route::is('pricing')) -->
                    <!-- <a class="nav-link mx-3 active" href="{{url('/#pricing')}}">Trailer
                        @else -->
                    <a class="nav-link mx-3" href="{{url('/#trailer')}}" data-page="trailer">Trailer
                        <!-- @endif -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="{{url('/#pricing')}}" data-page="pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    @if(Route::is('contact-us'))
                    <a class="nav-link mx-3 active" href="{{url('/contact_us')}}">Contact
                        @else
                        <a class="nav-link mx-3" href="{{url('/contact_us')}}">Contact
                            @endif
                        </a>

                </li>
            </ul>
            <form class="d-flex align-items-center centerMobile">
                @guest
                <a href="#" class="btn btn-text" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                <a href="#" class="me-3 btn btn_yellow" data-bs-toggle="modal" data-bs-target="#ragisterModel">Register</a>
                @else
                @php $arr = explode(' ',trim(Auth::user()->name)); @endphp
                <p style="color: #fff; margin: 3px 7px 0px 0px;">Welcome {{$arr[0]}} </p>
                {{-- <a href="#"><img src="{{asset('assets/img/setting.png') }}" alt="setting"></a> --}}
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="img/user.png" alt="user"> -->
                        <img src="{{asset('assets/img/user.png') }}" alt="user">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @if(Auth::user()->hasRole('User'))
                        <li><a class="dropdown-item" href="{{ route('dashboard.profile') }}">Profile</a>
                            <hr class="mx-1 my-0">
                        </li>
                        <li><a class="dropdown-item" href="{{url('User/my_booking')}}">Booking</a>
                            <hr class="mx-1 my-0">
                        </li>
                        @elseif(Auth::user()->hasRole('Admin'))
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <hr class="mx-1 my-0">
                        </li>
                        @endif
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                {{ __('Logout') }}
                            </a>

                        </li>
                    </ul>
                </div>
                @endif
            </form>
        </div>
    </div>
</nav>