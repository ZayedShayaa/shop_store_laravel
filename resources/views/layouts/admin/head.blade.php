<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from eduadmin-template.multipurposethemes.com/bs5/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Nov 2023 11:42:04 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--
    <link rel="icon" href="https://eduadmin-template.multipurposethemes.com/bs5/images/favicon.ico"> --}}
    <title>{{config('app.name', 'shop')}}</title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/skin_color.css')}}">

    <link rel="stylesheet" href="{{ asset('/assets/admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/rtl_style.css')}}">
    @yield('css')
</head>