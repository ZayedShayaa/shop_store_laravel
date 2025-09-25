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
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/morris.js/morris.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/OwlCarousel2/dist/assets/owl.carousel.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/OwlCarousel2/dist/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/horizontal-timeline/css/horizontal-timeline.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/flexslider/flexslider.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/prism/prism.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/datatable/datatables.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/Magnific-Popup-master/dist/magnific-popup.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/gallery/css/animated-masonry-gallery.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/lightbox-master/dist/ekko-lightbox.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/bootstrap-markdown-master/css/bootstrap-markdown.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/dropzone/dropzone.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/bootstrap-select/dist/css/bootstrap-select.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/raty-master/lib/jquery.raty.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/ion-rangeSlider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/ion-rangeSlider/css/ion.rangeSlider.skinModern.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/gridstack/gridstack.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/nestable/nestable.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/bootstrap-switch/switch.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/c3/c3.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/chartist-js-develop/chartist.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_plugins/bootstrap-slider/slider.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_plugins/iCheck/flat/blue.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/admin/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_plugins/pace/pace.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/vendor_components/weather-icons/weather-icons.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/skin_color.css')}}">

    <link rel="stylesheet" href="{{ asset('/assets/admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/rtl_style.css')}}">
    @yield('css')
</head>