@extends('layouts.app')

@section('content')


<div class="container"style="z-index: 2; padding-top: 8rem; padding-bottom: 5rem;">
    <div style="display: flex; align-items: center; justify-content: center;">

        <div style="flex: 0 0 auto; margin-right: 50px;">
            <img src="{{ asset('images/cl.png') }}" alt="Logo" width="100">
        </div>
    
   
        <div style="text-align: center; line-height: 1.2; color: #292a29;">
            <h5 style="margin: 0; font-size: 1rem;">Republic of the Philippines</h5>
            <h4 style="margin: 0; font-size: 1.5rem;">CENTRAL LUZON STATE UNIVERSITY</h4>
            <h5 style="margin: 0; font-size: 1rem;">Science City of Muñoz, Nueva Ecija</h5>
        </div>
        
        <div style="flex: 0 0 auto; margin-left: 50px;">
            <img src="{{ asset('images/eteeap.png') }}" alt="Logo" width="150">
        </div>
    </div>

    <div class="container">
        <div class="bg-white p-4 shadow rounded">
    <h2>Edit Profile</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        @if ($errors->has('password'))
        <div class="alert alert-danger">
            {{ $errors->first('password') }}
        </div>
    @endif
    
    @if ($errors->has('password_confirmation'))
        <div class="alert alert-danger">
            {{ $errors->first('password_confirmation') }}
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

     
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div x-data="{ show: false }" class="mb-3">
            <label for="password" class="form-label">New Password (optional)</label>
            <div class="input-group">
                <input :type="show ? 'text' : 'password'" class="form-control" id="password" name="password" placeholder="Enter new password">
                <button type="button" class="btn btn-outline-secondary" @click="show = !show">
                    <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                </button>
            </div>
        </div>
        
        <div x-data="{ show: false }" class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <div class="input-group">
                <input :type="show ? 'text' : 'password'" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                <button type="button" class="btn btn-outline-secondary" @click="show = !show">
                    <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                </button>
            </div>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('success') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ Session::get('error') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if(Session::has('validation_errors'))
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                html: '<ul style="text-align: left;">' +
                    @foreach (Session::get('validation_errors') as $error)
                        '<li>{{ $error }}</li>' +
                    @endforeach
                    '</ul>',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
