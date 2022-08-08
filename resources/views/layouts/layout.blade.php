<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Mohammad Shohel" name="author">
    <meta name="description" content="Call Center">
    <meta name="keywords" content="moshohel, eshan, shohel">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- SITE TITLE -->
    <title>
        @yield('title', 'Call Center')
    </title>
    <!-- CSS -->
    @include('partials.styles')

    @stack('css')

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- sidebar-->
    @include('partials.sidebar')
    <!--End sidebar-->

    <!-- header -->
    @include('partials.header')
    <!--End header -->

    <!-- Message (error or success) -->
    {{-- @include('partials.messages') --}}
    <!-- End Message (error or success) -->

    <!-- Main Content -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            @yield('content')
        </div>
    </div>
    <!-- End Main Content -->

    <!-- START FOOTER -->
    @include('partials.footer')
    <!-- END FOOTER -->


    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

    <!-- Scripts -->
    @include('partials.scripts')

    <!-- Custome Scripts -->
    @yield('scripts')

</body>

</html>