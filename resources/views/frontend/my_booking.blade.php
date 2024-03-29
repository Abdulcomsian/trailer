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
                        <a href="{{url('/user_profile')}}" class="menu_item">My Profile</a>
                        <a href="{{url('/my_booking')}}" class="menu_item active">My Bookings</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="filter_field d-flex justify-content-end">
                        <div class="filter">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Trailer Type</label>
                                             <!-- select -->
                                             <select class="form-select" aria-label="Default select example">
                                                <option selected>Select an option </option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Sort By</label>
                                            <!-- select -->
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Select an option </option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Completed</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Refund</button>
                </li>
                </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table-responsive">

                    <table class="table bookingTable">
                        <thead>
                            <tr>
                            <th scope="col">Trailer Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Pickup Time</th>
                            <th scope="col">Pickup Time</th>
                            <th scope="col">Hire Period</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>2T</td>
                              <td>Aug 21</td>
                              <td>Mon 1:00 PM </td>
                              <td>Tue 1:00 PM </td>
                              <td>1 Day</td>
                              <td><span class="text-success">Completed</span></td>
                              <td>-</td>
                            </tr>
                            <tr>
                              <td>2T</td>
                              <td>Aug 21</td>
                              <td>Mon 1:00 PM </td>
                              <td>Tue 1:00 PM </td>
                              <td>1 Day</td>
                              <td><span class="text-warning">Pending</span></td>
                              <td><a href="{{url('/photo_uploaded')}}" class="btn btn_yellow">Return</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        Refund
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