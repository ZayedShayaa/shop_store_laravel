<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <div class="app-menu">

    </div>

    <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
            <li class="btn-group nav-item d-lg-inline-flex d-none">
                <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen"
                    title="Full Screen">
                    <i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
                </a>
            </li>
            <li class="btn-group d-lg-inline-flex d-none">
                <div class="app-menu">
                    <div class="search-bx mx-5">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="{{ __('app.Search') }}" aria-label="{{ __('app.Search') }}"
                                    aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn" type="submit" id="button-addon3"><i
                                            class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
            <!-- Notifications -->


            <!-- User Account-->
            <li class="dropdown user user-menu">
                <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
                    <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                </a>
                <ul class="dropdown-menu animated flipInX">
                    <li class="user-body">
                        <a class="dropdown-item" href="{{ route('admin.edit') }}"><i
                                class="ti-user text-muted me-2"></i>
                            {{ __('app.Profile') }}</a>


                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-lock text-muted me-2"></i> {{ __('app.Logout') }}
                        </a>

                    </li>
                </ul>
            </li>

            <!-- Control Sidebar Toggle Button -->

        </ul>
    </div>
</nav>