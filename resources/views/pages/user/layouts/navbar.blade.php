<header class="header-area header-responsive-padding ">
    <div class="header-bottom sticky-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                    <div class="main-menu text-center">
                        <nav>
                            <ul>
                                <li><a href="/">HOME</a></li>
                                <li><a href="{{ route('categories') }}">Shop</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">

                    <div class="header-action-wrap">
                        <div class="header-action-style header-action-account">
                            @if (Auth::user())
                                <a href="{{ route('account.index') }}"><i class="pe-7s-user s-open"></i></a>
                            @endif


                        </div>

                        {{-- <div class="header-action-style header-search-1">
                                    <a class="search-toggle" href="#">
                                        <i class="pe-7s-search s-open"></i>
                                        <i class="pe-7s-close s-close"></i>
                                    </a>
                                    <div class="search-wrap-1">
                                        <form action="#">
                                            <input placeholder="Search products…" type="text">
                                            <button class="button-search"><i class="pe-7s-search"></i></button>
                                        </form>
                                    </div>
                                </div> --}}


                        <div class="header-action-style header-action-cart">
                            @guest
                                <a href="{{ route('login') }}"><i
                                        class="btn btn-success btn-sm d-none d-lg-block d-xl-block"
                                        style="font-size: 14px">Login</i></a>
                            @endguest
                        </div>

                        <div class="header-action-style header-action-cart">
                            @guest
                                <a href="{{ route('register') }}"><i
                                        class="btn btn-success btn-sm d-none d-lg-block d-xl-block"
                                        style="font-size: 14px">Register</i></a>
                            @endguest
                        </div>

                        @if (Auth::user())
                            <div class="header-action-style header-action-cart">
                                <a class="cart-active" href="#"><i class="pe-7s-shopbag"></i>
                                    <span class="product-count bg-black">
                                        {{ $cart->count() }}
                                    </span>
                                </a>
                            </div>
                        @endif

                        <div class="header-action-style d-block d-lg-none">
                            <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="off-canvas-active">
    <a class="off-canvas-close"><i class=" ti-close "></i></a>
    <div class="off-canvas-wrap">
        <div class="mobile-menu-wrap off-canvas-margin-padding-2">
            <div id="mobile-menu" class="slinky-mobile-menu text-left">
                <ul>
                    <li><a href="/">HOME</a></li>
                    <li><a href="{{ route('categories') }}#">Category</a></li>
                    @if (Auth::user())
                        <li><a href="{{ route('account.index') }}">Account</a></li>
                    @endif
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</div>
