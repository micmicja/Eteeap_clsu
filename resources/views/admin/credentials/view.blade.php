@extends('layouts.admin')  <!-- Use the admin layout -->

@section('content')
<div class="container">
    <h2 class="mb-4">Uploaded Credentials of {{ $user->first_name }} {{ $user->last_name }}</h2>

    <div class="row">
        @foreach ($credentials as $key => $file)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ ucwords(str_replace('_', ' ', $key)) }}</h5>

                        @if ($file)
                            <img src="{{ asset('storage/' . $file) }}" class="img-fluid rounded" style="max-height: 200px;">
                            <p class="mt-2 text-muted">{{ basename($file) }}</p>
                            <a href="{{ asset('storage/' . $file) }}" class="btn btn-outline-primary btn-sm mt-2" target="_blank">View Full</a>
                        @else
                            <p class="text-danger">Not Uploaded</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
