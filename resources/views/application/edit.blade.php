@extends('layouts.app')

@section('title', 'Edit Application')

@section('content')
<div class="container">
    <h2>Edit Application</h2>
    <a href="{{ route('user.index') }}" class="btn btn-primary mb-3">Back</a>
    <form id="editForm" method="POST" action="{{ route('application.update', $application->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    

        @include('user._form')



        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>

<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>

<!-- SweetAlert notification for success or error -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: true,
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            showConfirmButton: true,
        });
    </script>
@endif



@endsection
