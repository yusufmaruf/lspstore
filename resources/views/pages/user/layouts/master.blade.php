<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('pages.user.layouts.style')
    @stack('style')
</head>

<body>
    <div class="main-wrapper main-wrapper-2">
        @include('pages.user.layouts.navbar')
        <!-- mini cart start -->
        @include('pages.user.layouts.sidebarCart')
        @yield('content')


        @include('pages.user.layouts.footer')

    </div>
    <!-- All JS is here -->
    @include('pages.user.layouts.script')
    @stack('script')

</body>

</html>
