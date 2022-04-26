<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> @yield('title') </title>
    <base href="{{ asset('bower_components/template/admin') }}/">
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('admin.layout.header')
        @include('admin.layout.sidebar')
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('bower_components/pusher-js/dist/web/pusher.min.js') }}"></script>
    <script type="text/javascript">
        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            encrypted: true,
            cluster: "ap1"
        });
        var channel = pusher.subscribe('NotificationEvent');
             channel.bind('send-message', function(data) {
        var newNotificationHtml = `<a href="{{ route('order.index') }}"><span> Bạn có 1 đơn hàng mới ${ data }</span></a>`;
        let notification = parseInt($('.notification').text()) + 1;
        console.log('sum',notification)
            $('.notification').text(notification)
            $('.menu-notification').prepend(newNotificationHtml);
        });

    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

</body>
</html>
