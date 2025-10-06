<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
</head>
<body>
<div class="flex flex-col h-screen text-gray-400">
    @include('layouts.inc.app.header')
    <div class="flex justify-center items-center flex-grow ">
      <div class="container">
         @yield('content')
      </div>
    </div>
    @include('layouts.inc.app.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ( session('success'))
    <script>
        Swal.fire({
            title: "Амжилттай",
            text: "{{session('success')}}",
            icon: "success",
            confirmButtonText: "Хаах",
        });
    </script>
@elseif( session('error') )
    <script>
        Swal.fire({
            title: "Амжилтгүй",
            text: "{{session('error')}}",
            icon: "error",
            confirmButtonText: "Хаах",
        });
    </script>
@endif


</body>
</html>
