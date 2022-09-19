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

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css') }}">
</head>

<body class="dashboard_page">

    <!-- navbar -->
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

    <main class="dashboad_main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="dashboard_sidebar">
                    <div class="menu_items">
                        <a href="{{url('/dashboard')}}" class="menu_item active">Dashboard</a>
                        <a href="{{url('/user_profile')}}" class="menu_item">My Profile</a>
                        <a href="{{url('/my_booking')}}" class="menu_item">My Bookings</a>
                    </div>
                </div>
            </div>
           <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                 <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Trailers</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn_yellow">Trailers</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                 <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Booked Trailers</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn_yellow">Booked Trailers</a>
                        </div>
                    </div>
                </div>
            </div>
                    
           </div>
        </div>
    </div>
    </main>
    

    <footer class="py-0">
        <p class="copyright my-0">Copyright © 2022 oldmatestrailer. All rights reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- load jquery 3 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>