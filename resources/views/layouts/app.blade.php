<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en" class="light-theme">
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>@yield('title', 'Top Up Lebih Mudah & Simpel - ibotstore')</title> 
    <meta name="author" content="ibotstore"> 
    <meta name="keywords" content="ibotstore, ibotstore id, toko top up, top up game, mobile legends, free fire, pubg, higgs domino, royal dream, codm, top up, topup"> 
    <meta name="description" content="Top Up Lebih Mudah dan Simpel hanya di ibotstore Toko Top Up Game dan Voucher Termurah No. 1 di Indonesia"> 
    <meta property="og:title" content="Top Up Lebih Mudah & Simpel"> 
    <meta property="og:site_name" content="ibotstore"> 
    <meta property="article:published_time" content="2025-01-05T19:35:48+00:00"> 
    <meta property="article:modified_time" content="2025-01-05T19:35:48+00:00"> 
    <meta property="og:type" content="website"> 
    <meta property="og:image" content="{{ img('website','/logo.jpg') }}"> 
    <meta property="og:image:width" content="800"> 
    <meta property="og:image:height" content="534"> 
    <meta property="og:url" content="{{ url('/') }}"> 
    <meta property="og:description" content="Top Up Lebih Mudah dan Simpel hanya di ibotstore Toko Top Up Game dan Voucher Termurah No. 1 di Indonesia"> 
    <meta name="google-site-verification" content=""> 
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ img('website','/logo.jpg') }}"> 

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ url('public/css/metisMenu.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ url('public/css/mm-vertical.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ url('public/css/slick.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ url('public/css/slick-theme.css') }}">
    <link href="{{ url('public/css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ url('public/css/style.css') }}" rel="stylesheet"> 
    <link href="{{ url('public/css/dark-theme.css') }}" rel="stylesheet">

    <!-- Notyf CSS -->
<link href="https://cdn.jsdelivr.net/npm/notyf@3.5.0/notyf.min.css" rel="stylesheet">

<!-- Notyf JS -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3.5.0/notyf.min.js"></script>


    <style type="text/css">
        #bannerCarousel .carousel-indicators [data-bs-target] {
            background-color: black;
            width: 8px;
            height: 8px;
            border-radius: 50%; 
        }
        #bannerCarousel .carousel-indicators {
            bottom: -20px;
        }
        .error {
            color: red;
        }

        @media (min-width: 599px) {
            .custom-container {
                padding-left: 15px;
                padding-right: 15px;
            }

            .fixed-bottom {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }

        @media (min-width: 600px) {
            .custom-container {
                padding-left: 10%;
                padding-right: 10%;
            }

            .fixed-bottom {
                padding-left: 10% !important;
                padding-right: 10% !important;
            }
        }

        @media (min-width: 768px) {
            .custom-container {
                padding-left: 20%;
                padding-right: 20%;
            }

            .fixed-bottom {
                padding-left: 20% !important;
                padding-right: 20% !important;
            }
        }

        @media (min-width: 992px) {
            .custom-container {
                padding-left: 33%;
                padding-right: 33%;
            }

            .fixed-bottom {
                padding-left: 33% !important;
                padding-right: 33% !important;
            }
        }

        .custom-select {
    display: inline-block;
    width: auto;
    padding: 5px 10px;
    font-size: 14px;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    appearance: none;
}

label {
    font-size: 14px;
    font-weight: normal;
    color: #495057;
    display: flex;
    align-items: center;
    gap: 5px; /* Jarak antara teks dan dropdown */
}

.payment:hover {
    border:1px solid blue !important;
}
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body id='xbody'>
    <!-- Header -->
    @extends('layouts.header')

    <!-- Sidenav -->
    @extends('layouts.sidenav')

    <!-- Main Content -->
    <div class="d-flex align-items-center custom-container">
        @yield('content')
    </div>

    <!-- Sidenav -->
    @extends('layouts.notify')

    <!-- Footer -->
    @extends('layouts.footer')
   
    <!-- Script JS jika ada -->
    <script type="text/javascript">

        function btnSearch(param) {
            
            if(param == 'open'){
                $('.searchbar').show();
                $('.searchbar').addClass('full-search-bar');
            }else{
                $('.searchbar').hide();
                $('.searchbar').removeClass('full-search-bar');
            }

        }

        $(document).ready(function(){
         lozadgbr();
         setTimeout(function(){
          switchTema();
         }, 100);
        });
    
        function switchTema() {
         if ($('#xbody').hasClass('dark-mode')) {
          $('.tulisan').addClass('text-light');
         } else {
          $('.tulisan').addClass('text-dark');
         }
        }
    
        function lozadgbr() {
         const observer = lozad();
         observer.observe();
        }
    
        function copied(a) {
         let value = $(a).data('value');
         var dummy = $('<input>').val(value).appendTo('body').select();
         document.execCommand('copy');
         alert('Copied '+value);
         $(dummy).remove();
        }
    
        function rupiah(val) {
         var formatter = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
         });
    
         return formatter.format(val);
        }

        let show = 0;
        function btnSting() {
            if(show) {
              show = 0;
              $(".listSting").hide();
            } else {
              show = 1;
              $(".listSting").show();
            }
        }
        
 </script>

  @stack('scripts')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lozad@1.14.0/dist/lozad.min.js"></script>

</body>
</html>
