<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailer | Home</title>

    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome 5 CDN -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css"> -->

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css') }}">
</head>

<body class="form_page">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg inquiry_nav ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!-- <img src="img/logo.png" alt="logo"> -->
                <img src="{{asset('assets/img/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- img --> <img src="{{asset('assets/img/menu.png') }}" alt="menu">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex align-items-center ms-auto">
                    <a href="{{url('/contact_us')}}" class="mx-2 me-3 btn btn_yellow">Contact</a>
                    <!-- <a href="#"><img src="img/user.png" alt="user"></a> -->
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <img src="img/user.png" alt="user"> -->
                            <img src="{{asset('assets/img/user.png') }}" alt="user">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('dashboard.profile') }}">Profile</a>
                                <hr class="mx-1 my-0">
                            </li>
                            <li><a class="dropdown-item" href="{{url('User/my_booking')}}">Return Trailer</a>
                                <hr class="mx-1 my-0">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <?php

    ?>
    <main class="inquiry_main">
        <div class="row mx-0">
            <div class="col-lg-5">
                <!-- 1 -->
                <div class="side_content content2">
                    <h2 class="head">Payment Method</h2>
                    <div class="payment_form">
                        <div class="d-flex justify-content-between">
                            <p>Trailer payment:</p>
                            @php
                            $stime=date('Y-m-d h:i A', strtotime("$start_date $start_time"));
                            $etime = date('Y-m-d h:i A', strtotime("$end_date $end_time"));
                            $periodTimes=App\Utils\HelperFunctions::getHirePeriodTimes($stime,$etime);
                            $payment=App\Utils\HelperFunctions::getPaymentByHours($periodTimes['hire_hours'],$trailer_id);
                            if($value)
                            {
                                $payment=$payment-$value;
                            }
                            @endphp
                            <p id="trailer-payment" data-val="{{$payment}}">${{$payment}}</p>
                        </div>
                        <div class="d-flex justify-content-between borderBottom">
                            <p>Bond charges (Refundable):</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex mt-2 justify-content-between">
                            <p class="mb-0"><b>Total:</b></p>
                            <p class="mb-0"><b id="total">${{(float)$payment+150}}</b></p>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Choose payment method:</label>
                        <div class="d-flex">
                            <div class="bank_cards me-2 cardimg">
                                <a href="#" class="card_img">
                                    <img src="{{asset('assets/img/credit-card.png') }}" width="40" alt="Card">
                                </a>
                            </div>
                            <div class="bank_cards me-2">
                                <a href="#" class="card_img">
                                    <img src="{{asset('assets/img/gpay.png') }}" width="80" alt="gpay">
                                </a>
                            </div>
                            <div class="bank_cards me-2 paypalimg">
                                <a href="#" class="card_img">
                                    <img src="{{asset('assets/img/paypal.png') }}" width="80" alt="paypal">
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('order.submit')}}" method="POST" id="payment-form">
                        @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div id="paypal-button-container" class="d-none">
                             </div>
                            <div class="card">
                                    <input type="hidden" name="amount" value="{{(float)$payment}}" />
                                    <input type="hidden" name="trailer_id" value="{{$trailer_id}}" />
                                    <input type="hidden" name="start_time" value="{{$start_time}}" />
                                    <input type="hidden" name="end_time" value="{{$end_time}}" />
                                    <input type="hidden" name="start_date" value="{{$start_date}}" />>
                                    <input type="hidden" name="end_date" value="{{$end_date}}" />
                                    <input type="hidden" name="code" value="{{$code}}" />
                                    <div class="form-group">
                                        <div class="card-header text-warning">
                                            <label for="card-element">
                                                Enter your credit card information
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                           
                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>

                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                        <div class="progress_bar text-center mt-2">
                            <div class="progress" style="width: 90px;height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span for="#">2/3</span>
                        </div>
                        <div class="btns d-flex align-items-center">
                            <a href="{{ url()->previous()  }}" class="btn link text-white">GO BACK</a>
                            <button type="submit" class="btn btn_yellow ms-2" id="paybutton">Pay ${{(float)$payment+150}}</button>
                             
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
    <!-- load jquery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=Aae4GB5knrVLrqV6EpSXQMJkNbM3kaa6bGLTbGX0vkRUWn19sH-pDWUgmY72qhsGBuU402gTwIppueK1&currency=EUR"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function() {
            var stripe = Stripe('pk_test_9y4Gd3xTRMGZOq1vAXtSjrZ1');
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    color: "#32325d",
                    fontFamily: 'Arial, sans-serif',
                    fontSmoothing: "antialiased",
                    fontSize: "16px",
                    "::placeholder": {
                        color: "#32325d"
                    }
                },
                invalid: {
                    fontFamily: 'Arial, sans-serif',
                    color: "#fa755a",
                    iconColor: "#fa755a"
                }
            };
            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });
            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');
            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the customer that there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                hiddenInput.setAttribute('style', "border:1px");
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
        })
    </script>
    <script>
        paypal.Buttons({
            style: {
                layout: 'horizontal',
                fundingicons: 'true',
            },
            funding: {
                allowed: [paypal.FUNDING.CARD],

            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{(float)$payment+150}}'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Call your server to save the transaction
                    return fetch('/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            amount:'{{(float)$payment}}',
                            trailerid:'{{$trailer_id}}',
                            start_time:'{{$start_time}}',
                            end_time:'{{$end_time}}',
                            start_date:'{{$start_date}}',
                            end_date:'{{$end_date}}',
                            code:'{{$code}}',
                            _token: '{{csrf_token()}}'
                        })
                    }).then(function(res) {
                        console.log(res);
                        location.href = "{{url('order-sucess')}}/1";
                    });
                });
            }
        }).render('#paypal-button-container');
        $(window).scroll(function() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                if ($(".summary-bar-area").hasClass('open')) {
                    $(".summary-bar-area").attr("style", "position:fixed;top:0px !important;z-index:999999");
                }
            } else {
                $(".summary-bar-area").attr("style", "");
            }
         });
    </script>

    <script type="text/javascript">
        $(".paypalimg").on('click',function(){
            $("#payment-form .card").hide();
            $("#paybutton").hide();
            $("#paypal-button-container").removeClass('d-none');
        })

        $(".cardimg").on('click',function(){
            $("#paypal-button-container").addClass('d-none');
            $("#payment-form .card").show();
             $("#paybutton").show();
        })
    </script>
</body>

</html>