<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- VENDOR CSS -->
    @include('layouts.style')
    <style>
        .annual_report .c3-axis.c3-axis-y {
            display: none;
        }

        .annual_report .c3-axis.c3-axis-x {
            display: none;
        }
    </style>
    <!-- MAIN CSS -->
    @stack('style')
</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-orange">
        <!-- Page Loader -->
        <!-- Top navbar div start -->
        @include('layouts.navbar')
        <!-- main left menu -->
        @include('layouts.sidebar')
        <!-- mani page content body part -->
        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h2>@yield('title')</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a>
                                </li>
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">@yield('pages')</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('content')

            </div>
        </div>
    </div>
    @include('layouts.script')
    @stack('script')
</body>

</html>
