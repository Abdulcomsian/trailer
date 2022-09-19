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
                        <a href="{{url('/dashboard')}}" class="menu_item">Dashboard</a>
                        <a href="{{url('/user_profile')}}" class="menu_item active">My Profile</a>
                        <a href="{{url('/my_booking')}}" class="menu_item">My Bookings</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mb-5">
                <div class="text mb-4">
                    <h3>Personal Details</h2>
                </div>
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Enter Current Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                        </div>
                        <div class="col-lg-6">
                                 
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Enter New Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                    <div id="emailHelp" class="form-text"> Password must a least 6 character long! </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Your Bio</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>

                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="submit" class="btn btn-secondary ms-2">Cancel</button>
                    </div>
                </form>
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