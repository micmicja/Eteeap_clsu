@include('partials.navbar')

@extends('layouts.app')
@section('title', 'ETEEAP - Home')
@section('content')

<div style="
    position: fixed;
    inset: 0;
    background: url('{{ asset('inspinia/img/landing/r.jpg') }}') no-repeat center center;
    background-size: cover;
    background-blend-mode: overlay;
    z-index: 0;
    pointer-events: none;
"></div>

<div class="container" style="z-index: 2; padding-top: 3rem; padding-bottom: 5rem;">
    <div class="wrapper wrapper-content animated fadeInRight">
        <form>
            <div class="row justify-content-center align-items-center g-3 mb-4">
                <!-- Logo on the left -->
                <div class="col-12 col-md-auto text-center mb-2 mb-md-0">
                    <img src="{{ asset('images/cl.png') }}" alt="Logo" width="120" class="rounded-circle border border-2 border-success bg-white shadow-sm">
                </div>
                <!-- Text block centered -->
                <div class="col-12 col-md flex-grow-1 text-center" style="line-height: 1.2; color: #f0f1f0;">
                    <h5 class="mb-1" style="font-size: 1rem;">Republic of the Philippines</h5>
                    <h4 class="mb-1 fw-bold text-uppercase" style="font-size: 1.2rem; letter-spacing: 1px;">Central Luzon State University</h4>
                    <h5 class="mb-0" style="font-size: 1rem;">Science City of Muñoz, Nueva Ecija</h5>
                </div>
                <!-- Logo on the right -->
                <div class="col-12 col-md-auto text-center mt-2 mt-md-0">
                    <img src="{{ asset('images/eteeap.png') }}" alt="Logo" width="200" class="">
                </div>
            </div>
        </form>
        <h2 class="text-center mb-4" style="color: #fdfffd; font-size: 2rem;">My Applications</h2>
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
                <a href="{{ url('/') }}" class="btn btn-primary"><i class="fas fa-arrow-left me-1"></i> Back to Home</a>
            </div>
        @endif
        <div class="card shadow-lg mt-4" style="background: rgba(255,255,255,0.85); border-radius: 1rem; max-width: 900px; margin: 2rem auto; font-size: 1.05rem; border: 2px solid #e0e4ea; backdrop-filter: blur(10px); box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);">
            <div class="card-body p-4 p-md-5">
                <h3 class="card-title mb-4" style="font-weight: bold; color: #2d3e50;">Hello, {{ Auth::user()->name }}</h3>
                @if($applications->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle" style="background: #fff; font-size: 1.05rem;">
                            <thead class="thead-dark" style="background: #2d3e50; color: #fff;">
                                <tr>
                                    <th class="text-center">Application ID</th>
                                    <th class="text-center">Your Full Name</th>
                                    <th class="text-center">Contact Number</th>
                                    <th class="text-center">Submitted On</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                    <tr>
                                        <td style="font-weight: 500;">{{ $application->id }}</td>
                                        <td>{{ $application->first_name }} {{ $application->middle_name ?? '' }} {{ $application->last_name }}</td>
                                        <td>{{ $application->contact_number }}</td>
                                        <td>{{ $application->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-2">
                                                <div class="d-grid" style="grid-template-columns: repeat(3, 1fr); display: grid; min-width: 260px; gap: 0.5rem;">
                                                    <a href="{{ route('application.view', $application->id) }}" class="btn btn-info btn-sm" style="min-width: 80px;">
                                                        View
                                                    </a>
                                                    <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm" style="min-width: 80px;">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: contents;" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm w-100" style="min-width: 80px;">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-danger" style="font-size: 1.1rem; font-weight: 500;">You have not submitted any applications yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
@endsection
