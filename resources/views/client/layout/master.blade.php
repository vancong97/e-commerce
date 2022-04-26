<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <base href="{{ asset('bower_components/template/client') }}/">
    <link rel="stylesheet" href="assets/dest/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="assets/dest/css/style.css">
    <link rel="stylesheet" href="assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>
<body>


    @include('client.layout.header')

    <div class="rev-slider">
        @yield('content')
    </div>

    @include('client.layout.footer')
    <script src="assets/dest/js/jquery.js"></script>
    <script src="assets/dest/js/bootstrap.min.js"></script>
    <script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
    <script src="assets/dest/vendors/animo/Animo.js"></script>
    <script src="assets/dest/vendors/dug/dug.js"></script>
    <script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/dest/js/waypoints.min.js"></script>
    <script src="assets/dest/js/wow.min.js"></script>
    <script src="assets/dest/js/scripts.min.js"></script>
    <script src="assets/dest/js/custom2.js"></script>
    <script src="{{ asset('js/client.js') }}"></script>

</body>
</html>

