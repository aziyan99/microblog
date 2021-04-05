<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>login | admin area</title>
    <x-backend.layouts.ico />
    <!-- Custom CSS -->
    <link href="{{ asset('backend') }}/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @livewireStyles
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12"></div>
        <div class="col-lg-2 col-md-12 col-sm-12">
            @yield('main')
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12"></div>
    </div>
</div>
<script src="{{ asset('backend') }}/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts
</body>

</html>
