<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bitforge CMS')</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @stack('styles')

    <style>
        /* Perbaiki main-content biar rapi */
        .main-content {
            padding: 20px;
            background: #f4f6f9;
            min-height: calc(100vh - 120px);
        }
        .content-fluid {
            padding-left: 15px;
            padding-right: 15px;
        }
        .main-sidebar .sidebar {
            padding: 0;
        }
        /* Biar footer tetap di bawah */
        .wrapper {
            min-height: 100vh;
        }
        .content-wrapper {
            min-height: calc(100vh - 120px);
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        @include('layouts.footer')
    </div>

    <!-- JS AdminLTE -->
    <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('scripts')
</body>
</html>