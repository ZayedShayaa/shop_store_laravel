<header class="main-header">
    <div class="d-flex align-items-center logo-box justify-content-start">
        <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent"
            data-toggle="push-menu" role="button">
            <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span
                    class="path3"></span></span>
        </a>
        <!-- Logo -->
        <a href="{{route('/')}}" class="logo">
            <!-- logo-->
            <div class="logo-lg" style="display: flex; align-items: flex-end; gap: 8px;">
                <span class="light-logo">
                    <span style="font-size: 40px; font-weight: bold; color: #333;">store</span>
                    <img style="max-width: 50px;" src="{{asset('assets/site/images/light4.png')}}" alt="logo">
                </span>
                <span class="dark-logo">
                    <img style="    max-width: 50px;" src="{{asset('assets/site/images/light4.png')}}"
                        alt="logo"></span>
            </div>
        </a>

    </div>
    <!-- Header Navbar -->
    @include('layouts.admin.nav')
</header>