@extends('layouts.UserBackend.master')
@section('title')
Trailer | Dashboard
@endsection
@section('content')
<main class="dashboad_main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="dashboard_sidebar">
                    <div class="menu_items">
                        <a href="{{url('User/dashboard')}}" class="menu_item active">Dashboard</a>
                        <a href="{{url('User/profile')}}" class="menu_item">My Profile</a>
                        <a href="{{url('User/my_booking')}}" class="menu_item">My Bookings</a>
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
@endsection