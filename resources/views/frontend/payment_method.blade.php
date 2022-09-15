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

<body>

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
                <div class="side_content">
                    <h2 class="head">Payment Method</h2>
                    <div class="payment_form">
                        <div class="d-flex justify-content-between">
                            <p>Trailer payment:</p>
                            <p>$60</p>
                        </div>
                        <div class="d-flex justify-content-between borderBottom">
                            <p>Bond charges (Refundable):</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex mt-2 justify-content-between">
                            <p class="mb-0"><b>Total:</b></p>
                            <p class="mb-0"><b>$210</b></p>
                        </div>
                    </div>
                    <form>
                        <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Choose payment method:</label>
                            <div class="d-flex">
                                <div class="bank_cards me-2">
                                    <a href="#" class="card_img">
                                        <!-- <img src="img/paypal.png" width="80" alt="paypal"> -->
                                        <img src="{{asset('assets/img/paypal.png') }}" width="80" alt="paypal">
                                    </a>
                                </div>
                                <div class="bank_cards me-2">
                                    <a href="#" class="card_img">
                                        <!-- <img src="img/gpay.png" width="80" alt="gpay"> -->
                                        <img src="{{asset('assets/img/gpay.png') }}" width="80" alt="gpay">
                                    </a>
                                </div>
                                <div class="bank_cards me-2">
                                    <a href="#" class="card_img">
                                        <!-- <img src="img/paypal.png" width="80" alt="paypal"> -->
                                        <img src="{{asset('assets/img/paypal.png') }}" width="80" alt="paypal">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Card Name:</label>
                            <input type="email" class="form_control" id="exampleFormControlInput1"
                                placeholder="Enter card holder name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Card Number:</label>
                            <input type="email" class="form_control" id="exampleFormControlInput1"
                                placeholder="####-####-####-####">
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Expiration Date:</label>
                                    <input type="email" class="form_control" id="exampleFormControlInput1"
                                        placeholder="MM/YY">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">CCV:</label>
                                    <input type="email" class="form_control" id="exampleFormControlInput1"
                                        placeholder="###">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                        <div class="progress_bar text-center mt-2">
                            <div class="progress" style="width: 90px;height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span for="#">1/3</span>
                        </div>
                        <div class="btns d-flex align-items-center">
                            <a href="#" class="btn link text-white">GO BACK</a>
                            <a href="#" class="btn btn_yellow ms-2">Pay $210</a>
                        </div>
                    </div>
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
</body>

</html>