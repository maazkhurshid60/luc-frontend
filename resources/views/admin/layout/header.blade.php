<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/frontend/icons/afcon-group-logo.svg') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AFCON-Group') }}</title>

    <link rel="stylesheet"
        href="{{ asset('assets/backend/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/assets/vendor_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/assets/vendor_components/sweetalert/sweetalert.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/backend/css/master_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/skins/_all-skins.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-extend.css') }}"> --}}
    <link rel="stylesheet"
        href="{{ asset('assets/backend/assets/vendor_components/Ionicons/css/ionicons.css') }}">
    {{-- dropfiy plugin --}}
    <link rel="stylesheet"
        href="{{ asset('assets/backend/assets/vendor_components/dropify-master/dist/css/dropify.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/assets/vendor_plugins/DataTables-1.18.8/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/assets/vendor_plugins/iCheck/flat/blue.css') }}">


    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <style type="text/css">
        .table {
            width: 99% !important;
        }
    </style>
    <style type="text/css">
        div.dataTables_wrapper div.dataTables_length select {
            padding: .375rem 1.75rem .375rem .75rem;
        }
    </style>
    @yield('custom-css')
</head>
