<!DOCTYPE html>

<html lang="ar" style="direction: rtl">

<head>

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>الصفحة الرئيسية</title>

    <!-- <link rel="stylesheet" href="../style.css"> -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/skin_color.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="{{asset('assets/site/css/stylepro.css')}}?v=<?php echo time(); ?>">





    <!-- start fontawesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('css')
    <style>
        body {
            margin-bottom: 50px;
        }
    </style>
</head>



<body>

    <header>

        <!-- start logo -->

        <div class="logo">

            <img src="{{asset('assets/site/images/light4.png')}}" width="100">

            <h1>store</h1>

        </div>

        <!-- end logo -->

        <!-- start search -->

        <div class="search">

            <div class="search_bar">

                <form action="{{route('search')}}" method="get">

                    <input type="text" class="search_input" name="search" placeholder="أدخل كلمة البحث">

                    <button class="button_search" name="btn-search">بحث</button>

                </form>

            </div>

        </div>

        <!-- end search -->

    </header>

    <!-- start social -->

    <nav>

        <div class="social">

            <ul>

                <li><a href="https//www.facebook.com" target_blanck><i class="fa-brands fa-facebook"></i></a></li>

                <li><a href="https://wa.me/775944740" target_blanck><i class="fa-brands fa-whatsapp"></i></li>

                <li><a href="" target_blanck><i class="fa-brands fa-square-instagram"></a></i></li>

                <li><a href="" target_blanck><i class="fa-brands fa-youtube"></i></a></li>
                @if (Auth()->check() && Auth()->user()->is_admin)

                    <li><a href="{{route('dashboard')}}" target_blanck><i class="fa-brands fa-menu"></i>dashboard</a></li>
                @endif

            </ul>

        </div>

        <!-- end social -->

        <!-- start section -->

        <div class="section">

            <ul>

                <li><a href="{{route('/')}}">الرئيسية</a></li>



                @foreach ($sections as $section)
                    <li><a href="{{route('section', $section->id)}}">
                            {{$section->name}}

                        </a></li>
                @endforeach







            </ul>

        </div>

    </nav>

    <!-- end section -->

    <div class="last-post">

        <h4>مضاف حديثا</h4>

        <ul>


            @foreach ($lastproduct as $item)
                <li><a href="">

                        <span class="span-img"><img src="{{ asset('uploads/products/' . $item->proimg) }}"></span>

                    </a></li>
            @endforeach



        </ul>



        <!-- cart start -->

        <div class="cart" style="float:left;">

            <ul>
                @if (!Auth()->check())
                    <li><a href="{{route('login')}}"><i class="fa-solid fa-user"></i></a></li>
                @endif


                <li class="cart-icon"><a href="{{route('cart.index')}}"><i class="fas fa-shopping-cart "></i></a>



                    <span class="cart-count">{{session('cart_count')}}</span>

                </li>

            </ul>

        </div>

        <!-- cart end -->



    </div>