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

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css') }}">
</head>

<body>

      <!-- navbar -->
      @include('frontend.nav')

    <div class="hero_div about_us">
        <div class="container">
            <div class="about_hero">
                <h1 class="hero_heading">
                    Legal <span class="text_yellow">Service</span> 
                </h1>
            </div>
        </div>
    </div>

    <div class="term_service_text py-5">
        <div class="container">
            <h2 class="section_title">
                Legal Service
            </h2>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="list mb-3 mt-4">
                <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot">
                <span class="ms-3">Lorem ipsum dolor sit amet</span>
            </p>
            <p class="list mb-3 mt-4">
                <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot">
                <span class="ms-3">Lorem ipsum dolor sit amet</span>
            </p>
            <p class="list mb-3 mt-4">
                <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot">
                <span class="ms-3">Lorem ipsum dolor sit amet</span>
            </p>
            <p class="list mb-3 mt-4">
                <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot">
                <span class="ms-3">Lorem ipsum dolor sit amet</span>
            </p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>

         </div>
    </div>

  <!-- include footer -->
  @include('frontend.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="{{asset('assets/js/purecounter.js') }}"></script>
</body>

</html>