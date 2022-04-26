<div id="header">
    <div class="header-top" >
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li>
                        <a href="{{ route('contact') }}">
                            <i class="fa fa-home"></i>
                            {{ trans('header.address') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('index') }}">
                            <i class="fa fa-phone"></i>
                            {{ trans('header.phone') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <div class="space10">&nbsp;</div>
                <ul class="navbar-nav ml-auto">
                    <li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in"></i>
                                    {{ trans('message.signin') }}
                                </a>
                            </li>
                        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fa fa-sign-out"></i>
                                        {{ trans('message.signup') }}
                                    </a>
                                </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <div class="space10">&nbsp;</div>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i>
                                    <b>{{ trans('message.hello') }} {{ Auth::user()->name }}
                                    </b>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdown">
                                    <ul class="col-sm-12">
                                        <li>
                                            <a href="{{ route('profileuser', Auth::user()->id) }}">
                                                <i class="fa fa-user"></i>
                                                {{ trans('header.acount') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('suggest') }}">
                                                <i class="fa fa-spinner"></i>
                                                {{ trans('header.suggest') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('history.order') }}">
                                                <i class="fa fa-shopping-cart"></i>
                                                {{ trans('header.historyorder') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out"></i>
                                                {{ trans('message.logout') }}
                                            </a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @endguest
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{ route('index') }}" id="logo">
                    <img src="{{ config('config.logo-cake') }}" height="100px" alt="">
                </a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{ route('search') }}">
                        <input type="text" value="" name="search"/>
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select">
                            <i id="cart" class="fa fa-shopping-cart">
                                @if (count((array)session('cart')) > config('config.zero'))
                                    {{ count((array)session('cart')) }}
                                @else
                                    {{ trans('message.nocart') }}
                                @endif
                            </i>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <div class="beta-dropdown cart-body">
                            @if (Session::has('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <div class="cart-item">
                                        <a class="cart-item-delete remove-from-cart"
                                            data-id="{{ $id }}" data-url="{{ route('removecart', $id) }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img src="{{ asset('storage/images/' . $details['image']) }}">
                                            </a>
                                            <div class="media-body">
                                                <span class="cart-item-title">
                                                    {{ $details['name'] }}
                                                </span>
                                                <span>
                                                    {{ $details['quantity'] }} *
                                                    {{ number_format($details['price']) }}
                                                    {{ trans('message.$') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach
                            @endif
                            <div class="cart-caption">
                                <div class="cart-total text-right">
                                    @php $total = config('config.zero') @endphp
                                    @if (Session::has('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                        @endforeach
                                    @endif
                                    <span class="cart-total-value">
                                        @if ($total == config('config.zero'))
                                        @else
                                            {{ trans('message.total') }}
                                            {{ number_format($total) }}
                                            {{ trans('message.$') }}

                                    </span>
                                </div>
                                <div class="clearfix"></div>
                                <div >
                                    <a href="{{ route('cart') }}" class="beta-btn primary text-center">
                                        {{ trans('message.checkout') }}
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li>
                        <a href="{{ route('index') }}">{{ trans('header.index') }}</a>
                    </li>
                    <li>
                        <a href="#">{{ trans('header.category') }}</a>
                        <ul class="sub-menu">
                            @foreach($categories as $item)
                                @if($item->children->count() > 0)
                                    <li>
                                        <a href="#">{{ $item->name }}</a>
                                        <ul class="sub-menu">
                                            @foreach($item->children as $submenu)
                                                <li><a href="{{ route('category', $submenu->id) }}">{{ $submenu->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">{{ trans('header.about') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">{{ trans('header.contact') }}</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>
