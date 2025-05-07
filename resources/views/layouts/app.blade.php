<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'INSPINIA - Landing Page')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  
    <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">
  

@if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'Okay'
        });
    </script>
@endif


@if (session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'Try Again'
        });
    </script>
@endif

</head>


<style>
    .navbar-nav .nav-item {
        margin-right: 150px; 
    }
    .user-dropdown a {
        font-weight: bold;
        font-size: 18px; 
    }
</style>

<body id="page-top" class="landing-page no-skin-config">
    <script>
        var isEditOrView = @json(Route::is('application.edit') || Route::is('application/*/view*'));
    </script>
    

  
    @if (!request()->is('user/index*') && !request()->is('application/*/view*'))
    @include('partials.navbar')
@endif
<main>
    @yield('content')


</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   
    <script src="{{ asset('inspinia/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/popper.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/bootstrap.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    
    <script src="{{ asset('inspinia/js/inspinia.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/wow/wow.min.js') }}"></script>


      

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">



<script>
    var isCreatePage = {{ (request()->routeIs('user.application.information') || request()->routeIs('user.application.create')) ? 'true' : 'false' }};
</script>

<script src="{{ asset('js/autosave.js') }}"></script>


   
                
        
            
            
        
    


</body>
</html>
