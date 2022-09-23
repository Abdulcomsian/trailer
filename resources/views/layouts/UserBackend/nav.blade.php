<nav class="navbar navbar-expand-lg inquiry_nav dashboard_nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{asset('assets/img/logo-2.png') }}" alt="logo">
        </a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <!-- img --> <img src="{{asset('assets/img/menu.png') }}" alt="menu"> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex align-items-center ms-auto">
                <a href="{{url('/contact_us')}}" class="mx-2 me-3 btn btn_yellow">Contact</a>
                <a href="#">
                    <img src="{{asset('assets/img/menu_2.png') }}" alt="user">
                </a>
            </form>
        </div>
    </div>
</nav>