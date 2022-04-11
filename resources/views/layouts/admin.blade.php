<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AdminLTE 3 | Projects</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> --}}
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="css/admin.css"> --}}
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->

        @include('inc.admin.header')
        <!-- Content Wrapper. Contains page content -->
        @yield('body')
        <!-- /.content-wrapper -->
        @include('inc.admin.footer')

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="{{ mix('/js/admin.js') }}"></script>
    {{-- <script src="js/manifest.js"></script> --}}
    {{-- <script src="js/vendor.js"></script> --}}
    {{-- <script src="public/js/bootstrap.bundle.min.js"></script> --}}
    <!-- Bootstrap 4 -->

    <!-- AdminLTE App -->
    {{-- <script src="js/admin.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="../../dist/js/demo.js"></script> --}}
</body>

</html>
