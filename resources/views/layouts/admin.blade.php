<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="Student Portal" />
    <title> Home | @yield('title')</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset($contact->image) }}" type="image/x-icon">
    <!-- css files -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/dataTabel.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/toastr.min.css') }}" rel="stylesheet" id="galio-skin">

    @stack('admin-css')
</head>

<body class="sb-nav-fixed fixed-footer" onload="startTime()">

    @include('partials.admin_navbar')
    <div id="layoutSidenav">
        @include('partials.admin_sidebar')
        <div id="layoutSidenav_content">
            <div class="container mt-4">
                @yield('admin-content')
                @include('partials.admin_footer')
            </div>
        </div>
        <!-- js files -->
        <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="{{ asset('admin/js/simple-datatables@latest.js') }}"></script>
        <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
        <script src="{{ asset('admin/js/all.min.js') }}"></script>
        <script src="{{ asset('admin/js/toastr.min.js') }}"></script>

        <script>
            @if (Session::has('update'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('update') }}");
            @endif

            @if (Session::has('message'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('message') }}");
            @endif
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('success') }}");
            @endif

            @if (Session::has('remove'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('remove') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('error') }}");
            @endif
        </script>
        <script>
            function startTime() {
                const today = new Date();
                const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"
                ];
                let d = today.getDay();
                let date = today.getDay();
                let h = today.getHours();
                let m = today.getMinutes();
                let s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML = days[today.getDay()] + ',' + ' ' + today.getDate() + ' ' + months[
                    today.getMonth()] + ' ' + today.getFullYear() + ',' + ' ' + h + ":" + m + ":" + s;
                setTimeout(startTime, 1000);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                };
                return i;
            }
        </script>


        <script>
            window.addEventListener('DOMContentLoaded', event => {
                const datatablesSimple = document.getElementById('first_table');
                if (datatablesSimple) {
                    new simpleDatatables.DataTable(datatablesSimple);
                }
                const confirmTable = document.getElementById('confirm');
                if (confirmTable) {
                    new simpleDatatables.DataTable(confirmTable);
                }
            });
        </script>
        @stack('admin-js')
</body>

</html>
