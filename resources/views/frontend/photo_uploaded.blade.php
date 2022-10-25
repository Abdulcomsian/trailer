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

<body class="form_page">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg inquiry_nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!-- <img src="img/logo.png" alt="logo"> -->
                <img src="{{asset('assets/img/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <!-- img --> <img src="{{asset('assets/img/menu.png') }}" alt="menu"> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex align-items-center ms-auto">
                    <a href="{{url('/contact_us')}}" class="mx-2 me-3 btn btn_yellow">Contact</a>
                    <a href="#">
                        <!-- <img src="img/user.png" alt="user"> -->
                        <img src="{{asset('assets/img/user.png') }}" alt="user">
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <main class="inquiry_main">
        <div class="row mx-0">
            <div class="col-lg-5">
                <div class="side_content content1">
                     <form method="post" action="{{url('User/Order/trailer-upload-photo')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="upload_photo">
                            <h2 class="mb-0">Upload Photos </h2>
                            <p>Upload at least 4 photos of trailer from different angles</p>
                            <input type="hidden" name="order_id" value="{{$id}}">
                            <div class="mt-3">
                                <input class="form-control w-100 form_control" type="file" id="images" name="images[]" multiple required>
                                <span class="text-end mt-2 d-block">(max. 0/8)</span>
                            </div>
                            <span class="text-danger images_valid">
                                 {{$errors->first('images')}}
                            </span>
                        </div>
                        <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                            <div class="progress_bar text-center mt-2">
                                <div class="progress" style="width: 90px;height: 7px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span for="#">1/2</span>
                            </div>
                            <div class="btns d-flex align-items-center">
                                <a href="{{url('User/my_booking')}}" class="btn link text-white">GO BACK</a>
                                <button type="submit" class="btn btn_yellow ms-2">Return Trailer</button>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
            <div class="col-lg-7 p-0">
                <div class="img">
                    <!-- <img src="img/car_main.png" class="w-100" alt="car"> -->
                    <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="car">
                </div>
            </div>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- load jquery 3 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</body>

</html>