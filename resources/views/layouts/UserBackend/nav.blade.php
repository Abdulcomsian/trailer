<nav class="navbar navbar-expand-lg inquiry_nav dashboard_nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('assets/img/logo-2.png') }}" alt="logo">
        </a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <!-- img --> <img src="{{asset('assets/img/menu.png') }}" alt="menu"> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex align-items-center ms-auto">
                <a href="{{url('/contact_us')}}" class="mx-2 me-3 btn btn_yellow">Contact</a>
                {{-- <a href="#">
                    <img src="{{asset('assets/img/menu_2.png') }}" alt="user">
                </a> --}}
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="img/user.png" alt="user"> -->
                        <img src="{{asset('assets/img/menu_2.png') }}" alt="user">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('dashboard.profile') }}">Profile</a>
                            <hr class="mx-1 my-0">
                        </li>
                        <li><a class="dropdown-item" href="{{url('User/my_booking')}}">Return Trailer</a>
                            <hr class="mx-1 my-0">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</nav>