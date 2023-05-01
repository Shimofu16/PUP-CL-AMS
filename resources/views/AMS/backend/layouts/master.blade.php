<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ Auth::user()->role->display_name }} @hasSection('page-title')
            - @yield('page-title')
        @else
        @endif
    </title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('assets/images/PUP.png') }}" type="image/x-icon">



    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/packages/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/DataTables/datatables.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    {{-- page css --}}
    @yield('styles')
    {{-- livewire style --}}
    @livewireStyles
</head>

<body>

    <!-- ======= Header ======= -->
    @include('AMS.backend.layouts.header')
    @include('AMS.backend.layouts.logout-modal')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @yield('sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        {{-- page titles --}}
        <div class="pagetitle">

            <nav>
                <ol class="breadcrumb">
                    @hasSection('page-breadcrumb')
                        <li class="breadcrumb-item"><a href="@yield('breadcrumb-link')">@yield('page-breadcrumb')</a></li>
                        <li class="breadcrumb-item active">@yield('page-title')</li>
                    @else
                    @endif
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            @yield('contents')
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- @include('AMS.backend.layouts.footer') --}}
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/packages/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/packages/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/packages/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/packages/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/packages/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/packages/jQuery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/packages/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/packages/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/packages/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- livewire scripts --}}
    @livewireScripts
    {{-- sweetalert --}}
    @include('sweetalert::alert')
    @yield('scripts')
</body>

</html>
