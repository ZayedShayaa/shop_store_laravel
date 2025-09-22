<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">

                    <li class="  @if (request()->is('sections*')) {{ 'active' }} 

                    @endif">

                        <a href="{{route('sections.index')}}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>{{__('app.Sections')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>

                        </a>

                    </li>

                    <li class="  @if (request()->is('products*')) {{ 'active' }} 

                    @endif">

                        <a href="{{route('products.index')}}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>{{__('app.Products')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>

                        </a>

                    </li>
                    <li class="  @if (request()->is('users*')) {{ 'active' }} 

                    @endif">

                        <a href="{{route('users.index')}}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>{{__('app.Users')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>

                        </a>

                    </li>
                    <li class="  @if (request()->is('orders*')) {{ 'active' }} 

                    @endif">

                        <a href="{{route('orders.index')}}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>{{__('app.Orders')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>

                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </section>

</aside>