<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="">
                <span class="logo-text">
                     <img src="{{ config('config.logo') }}"  class="light-logo"/>
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect
                    waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                </li>
                <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                    href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control">
                        <a class="srh-btn"><i class="ti-close"></i></a>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="mdi mdi-bell font-24"></i><span class="notification">{{ $notifications }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right menu-notification" aria-labelledby="navbarDropdown">
                        @foreach ($notification as $notifi)
                            <a class="dropdown-item" href="{{ route('order.detail', $notifi->data ) }}">
                                <i class="mdi mdi-shopping"></i>
                                <span>{{ trans('message.ordernotification') }}</span>
                                <span>{{ $notifi->data }}</span>
                                @if ($notifi->read_at == null)
                                    <span class="not_seen" >{{ trans('chưa xem') }}</span>
                                @else
                                    <span class="watched">{{ trans('đã xem') }} </span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <b>{{ trans('message.hello') }} {{ Auth::user()->name }}</b>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                       href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                       <img class="user" src="{{ config('config.user') }}" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="{{ route('get.changepass') }}">
                            <i class="ti-user m-r-5 m-l-5"> {{ trans('header.changepass') }}</i>
                        </a>
                        <a class="dropdown-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i>
                            {{ trans('message.logout') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
