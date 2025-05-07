@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Department Coordinator Dashboard</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Applicant Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                    <td><span class="badge bg-primary">{{ $application->status }}</span></td>
                    <td>
                        <a href="{{ route('department.application.view', $application->id) }}" class="btn btn-info btn-sm">View</a>

                        @if($application->status == 'Accepted by Assessor')
                            <form action="{{ route('department.application.accept', $application->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Accept</button>
                            </form>
                            <form action="{{ route('department.application.reject', $application->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
