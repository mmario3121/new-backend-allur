<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('adminlte-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte-assets/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('adminlte-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte-assets/dist/css/loader.css') }}">

    <link rel="apple-touch-icon" href="/adminlte-assets/dist/img/mobile-icon.png">
    <link rel="icon" type="image" href="/adminlte-assets/dist/img/mobile-icon.png">

    @stack('styles')

{{--    @livewireStyles()--}}

    <style>
        .form-group.required .control-label:after {
            content: "*";
            color: red;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="overflow"></div>
@include('admin._components.loader')

<div class="wrapper">
    @includeIf('admin._components.navbar')

    @includeIf('admin._components.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

<script src="{{ asset('adminlte-assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte-assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('adminlte-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('adminlte-assets/dist/js/adminlte.js') }}"></script>

<script src="{{ asset('adminlte-assets/dist/js/demo.js') }}"></script>

<script>
    const url = window.location;

    $('ul.nav-sidebar a').filter(function () {
        if (this.href) {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }
    }).addClass('active');

    $('ul.nav-treeview a').filter(function () {
        if (this.href) {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>

@stack('scripts')

{{--@livewireScripts()--}}
</body>
</html>
