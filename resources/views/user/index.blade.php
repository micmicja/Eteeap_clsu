
@include('partials.navbar')

@extends('layouts.app')
@section('title', 'ETEEAP - Home')
@section('content')

<div style="
    position: absolute;
    inset: 0;
    background: url('{{ asset('inspinia/img/landing/r.jpg') }}') no-repeat center center;
    background-size: cover;
    background-blend-mode: overlay;
    z-index: 0;
  "></div>

<div class="container"style="z-index: 2; padding-top: 8rem; padding-bottom: 5rem;">
    <div class="wrapper wrapper-content animated fadeInRight">

        <form>
            <div style="display: flex; align-items: center; justify-content: center;">
                <!-- Logo on the left -->
                <div style="flex: 0 0 auto; margin-right: 50px;">
                    <img src="{{ asset('images/cl.png') }}" alt="Logo" width="100">
                </div>
            
                <!-- Text block centered -->
                <div style="text-align: center; line-height: 1.2; color: #f0f1f0;">
                    <h5 style="margin: 0; font-size: 1rem;">Republic of the Philippines</h5>
                    <h4 style="margin: 0; font-size: 1.5rem;">CENTRAL LUZON STATE UNIVERSITY</h4>
                    <h5 style="margin: 0; font-size: 1rem;">Science City of Muñoz, Nueva Ecija</h5>
                </div>
                
            
                <!-- Logo on the right -->
                <div style="flex: 0 0 auto; margin-left: 50px;">
                    <img src="{{ asset('images/eteeap.png') }}" alt="Logo" width="150">
                </div>
            </div>
            
          
    <h2 style="color: #fdfffd; font-size: 2rem;">My Applications</h2>


    @if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: {!! json_encode(session('success')) !!},
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            customClass: {
                popup: 'p-2 text-sm' // smaller padding & font
            }
        });
    </script>
    @endif
    
    
    @if (request()->is('user/index*'))
        <div class="text-left mt-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Hello, {{ Auth::user()->name }}</h5>

            @if($applications->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Application ID</th>
                            <th>Your Full Name</th>
                            <th>Contact Number</th>
                            <th>Submitted On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->first_name }} {{ $application->middle_name ?? '' }} {{ $application->last_name }}</td>
                                <td>{{ $application->contact_number }}</td>
                                <td>{{ $application->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('application.view', $application->id) }}" class="btn btn-info btn-sm">
                                        View
                                    </a>
                                    <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    
                                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-danger">You have not submitted any applications yet.</p>
            @endif
        </div>
    </div>
</div>
</div>
@include('partials.footer')
@endsection
