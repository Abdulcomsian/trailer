<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome 5 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.timepicker.css') }}">

    <style>
        .toast-top-right {
    top: 0 !important;
    right: 0 !important;
    width: 100% !important;
        transform: translate(40%, 0%);
    </style>

    @yield('css')
</head>

<body style="overflow-x: hidden">

    <!-- navbar -->
    @include('layouts.Frontend.nav')

    {{-- modal --}}
    @include('layouts.Frontend.modal')

    @yield('content')

    <!-- include footer -->
    @include('layouts.Frontend.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="{{asset('assets/js/purecounter.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script>
        $('input[name="date"]').daterangepicker({
            locale: {
              format: 'D/M/Y'
            },
            minDate:new Date()
        });
        $('input[name="date"]').val('');

    </script>

    <!-- Initialize Swiper -->
    <script>
        $(".navbar-nav li a").click(function(){
            console.log("here")
  var pageId = $(this).attr("data-page");
  $("html, body").animate({ scrollTop: $("#"+pageId).offset().top-$(".navbar").height() }, 100);
});
        var swiper1 = new Swiper(".swiper1", {
            direction: "vertical",
            speed: 2000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper2 = new Swiper(".swiper2", {
            slidesPerView: 1,
            direction: "vertical",
            effect: "flip",
            loop: true,
            speed: 2000,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            // effect: "fade",
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

      var swiper3 = new Swiper(".swiper3", {
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: true,
            speed: 2000,
            // autoplay: {
            //     delay: 4000,
            //     disableOnInteraction: false,
            // },
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
      });
    //   swiper2.on('slideChange', function () {
    //     $('.custom_pagination_in').html($('.pagination_custom').html())
       
    //   });
    //   swiper event triiger on only next slide
        swiper2.on('slideChangeTransitionEnd', function () {
            $('.swiper-slide-active .ghost_dev').html($('.swiper-slide-next .feedback').html());
            // $('.swiper-slide-active .ghost_dev').html($('.swiper-slide-next .feedback').html());
        });
        //  swiper event triiger on only prev slide
        swiper2.on('slideChangeTransitionStart', function () {
            $('.swiper-slide-active .ghost_dev').html($('.swiper-slide-prev .feedback').html());
            // $('.swiper-slide-active .ghost_dev').html($('.swiper-slide-next .feedback').html());
        });

        $('.counter').counterUp()
    </script>

    <!-- load jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> 


    <script>
        $('#datePicker').on('change', function () {
            $('#datePut').val(this.value);
        });

        $('#droptime').on('change', function () {
            $('#droptimeInput').val(this.value);
        });

        // $('#droptimeInput').click(function(){
        //     alert(1)
        //     // focus input
        //     $('#droptime').focus()
        // })

        $('#picktime').on('change', function () {
            $('#picktimeinput').val(this.value);
        });
        $('.card_img').click(function () {
            $('.card_img').toggleClass('absolute');
            $('.featureText').toggleClass('d-none');
        });


        $('#togglePass').click(function (e) {
            e.preventDefault();
            if ($('#togglePassInput').attr('type') == 'password') {
                $('#togglePassInput').attr('type', 'text');
            } else {
                $('#togglePassInput').attr('type', 'password');
            }
        });
        // $('.card_img').click(function () {
        //     $('.card_img').toggleClass('absolute');
        // });
        
    </script>

    <script>
        function toggleModel() {
            $('#loginModal').modal('toggle');
            $('#ragisterModel').modal('toggle');
        }

</script>
        @if (count($errors) > 0)
            @if($errors->first('email')=='These credentials do not match our records.')
            <script>
                setTimeout(() => {
                    $('#loginModal').modal('show');
                }, 300);
            </script>
            @elseif($errors->first('trailer_id')=='The trailer id field is required.')
            <script>
           
            </script>
            @else
            <script>
            setTimeout(() => {
                $('#ragisterModel').modal('show');
                }, 300);
            </script>
            @endif
        @endif 
        <script>

        function forgotPass() {
            $('#loginModal').modal('toggle');
            $('#ForgotPassword').modal('toggle');
        }

        $('#loginModal #togglePass').on('click', function () {
            // $('#loginModal #togglePassInput').attr('type', 'text');
            // toggle type
            if ($('#loginModal #togglePassInput').attr('type') == 'password') {
                $('#loginModal #togglePassInput').attr('type', 'text');
            } else {
                $('#loginModal #togglePassInput').attr('type', 'password');
            }
            
        });
    </script>


<script src="{{asset('assets/js/jquery.timepicker.js') }}"></script>
<script>
    $(function() {
        $('#disableTimeRangesExample').timepicker({ 
            'step': 60,
            'disableTimeRanges': [
             ]
         });

        // $('#droptimeInput').timepicker();
        $('#droptimeInput').timepicker({ 
             'step': 60,
            'disableTimeRanges': [
                // ['1am', '2am'],
                // ['3am', '4:01am']
        ] });
        
    });




 
</script>
@yield('script')
</body>
</html>