<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('system_title', 'Default Title') }}</title>


    <!-- Inspinia CSS Files -->
    <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">

    @yield('styles')
    <!-- bootstrap  -->
    
    



</head>
<body>

<div id="wrapper">
    @include('admin.includes.sidebar')  <!-- Load Sidebar -->

    <div id="page-wrapper" class="gray-bg">
        @include('admin.includes.header')  <!-- Load Header -->

        <div class="wrapper wrapper-content">
            @yield('content')  <!-- Page content goes here -->
        </div>

        @include('admin.includes.footer')  <!-- Load Footer -->
    </div>
</div>
@include('partials.footer')
<!-- Inspinia JS Files -->



    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('inspinia/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('inspinia/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('inspinia/js/inspinia.js') }}"></script>

@yield('scripts')
</body>
</html>
