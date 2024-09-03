<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'ADMIN')</title>
        <!--favicon-->
        <link rel="icon" type="image/png" href="{{ asset('back/img/F&F-show-favicon.png') }}">
        <!-- simplebar CSS-->
        <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
        <!-- Bootstrap core CSS-->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- animate CSS-->
        <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
        <!-- Icons CSS-->
        <link href="{{ asset('assets/css/icons_custom.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
        <!-- Sidebar CSS-->
        <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet">
        @yield('styles')
        <!-- Custom Style-->
        <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet">
        <link href="{{ asset('back/css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('back/css/custom-styles.css') }}" rel="stylesheet">

    </head>
    <body>
        @include('back.layout.partials.loader')
        <!-- Start wrapper-->
        <div id="wrapper">
            @include('back.layout.partials.sidebar')
            @include('back.layout.partials.topbar')
            <div class="clearfix"></div>
            @include('back.layout.partials.content')
            @include('back.layout.partials.backtotop')
            @include('back.layout.partials.footer')
        </div>
        <form id="logout-form" action="{{ route('back.access.logout') }}" method="POST" class="d-none">
            {{ csrf_field() }}
        </form>
        <!--End wrapper-->

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- simplebar js -->
        <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
        <!-- sidebar-menu js -->
        <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
        <!-- Custom scripts -->
        <script src="{{ asset('assets/js/app-script.js') }}"></script>
        <script src="{{ asset('back/js/scripts.js') }}"></script>
        @yield('scripts')
    </body>
</html>
