<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-backend.layouts.ico />
    <link href="{{ asset('frontend') }}/assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,300;1,100;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/custom/css/main.css">
    @livewireStyles
    <title>{{ $title }}</title>
</head>

<body>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <x-frontend.layouts.topbar />
            @yield('main')
            <x-frontend.layouts.bottombar />
        </div>
    </div>
</div>
<script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.js"></script>
@livewireScripts
@stack('js')
</body>

</html>
