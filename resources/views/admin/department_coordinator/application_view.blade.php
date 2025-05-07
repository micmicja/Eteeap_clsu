@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Application Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID:</th>
            <td>{{ $application->id }}</td>
        </tr>
        <tr>
            <th>Applicant Name:</th>
            <td>{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
        </tr>
        <tr>
            <th>Birthdate:</th>
            <td>{{ $application->birthdate }}</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>{{ $application->address }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td><span class="badge bg-primary">{{ $application->status }}</span></td>
        </tr>
    </table>

    <a href="{{ route('department.dashboard') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
