


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('assets/img/redstar-icon.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Paris Post') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/backend/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/assets/vendor_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/assets/vendor_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend//css/master_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/skins/_all-skins.css') }}">   

   
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    @yield('custom-css')
</head>

@yield('content')


<script src="{{ asset('assets/backend/assets/vendor_components/jquery/dist/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/backend/assets/vendor_components/popper/dist/popper.min.js') }}"></script>
<script src="{{ asset('assets/backend/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</html>
