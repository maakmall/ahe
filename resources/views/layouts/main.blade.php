<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/logo.png" />
    <link rel="stylesheet" href="/assets/css/styles.min.css" />
    <style>
        .btn-primary,
        .bg-primary,
        .active {
            background-color: #cd59a4 !important;
            border-color: #cd59a4 !important;
        }

        .btn-outline-primary {
            color: #cd59a4 !important;
            border-color: #cd59a4 !important;
        }

        .btn-outline-primary:hover {
            background-color: #cd59a4 !important;
            border-color: #cd59a4 !important;
            color: #fefefe !important;
        }

        .btn-primary:hover {
            background-color: #b84c8d !important;
            border-color: #b84c8d !important;
        }

        .text-primary {
            color: #cd59a4 !important;
        }

        .text-hover-primary:hover {
            color: #b84c8d !important;
        }

        .sidebar-link:hover {
            color: #e9eff5 !important;
        }


    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        @include('partials.sidebar')
        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('partials.header')
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/sidebarmenu.js"></script>
    <script src="/assets/js/app.min.js"></script>
    <script src="/assets/libs/simplebar/dist/simplebar.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
