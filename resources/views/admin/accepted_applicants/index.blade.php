@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2 class="mb-4">List of Accepted Applicants</h2>

   
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by name or degree program">
    </div>

    <h3>Not Scheduled Applicants</h3>
    <form action="{{ route('schedule.create') }}" method="GET" id="scheduleForm">
        @csrf
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>ID</th>
                        <th>Applicant Name</th>
                        <th>Degree Program</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        @if(!$application->schedule)
                            <tr class="animated fadeIn">
                                <td class="text-center">
                                    <input type="checkbox" name="applicant_ids[]" value="{{ $application->id }}">
                                </td>
                                <td>{{ $application->id }}</td>
                                <td class="applicant-name">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                                <td class="degree-program">{{ $application->degree_program }}</td>
                                <td>
                                    <span class="badge {{ $application->status == 'Accepted by College Coordinator' ? 'bg-success' : 'bg-info' }}">
                                        {{ $application->status == 'Accepted by College Coordinator' ? 'Qualified' : $application->status }}
                                    </span>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-calendar"></i> Schedule Interview</button>
        </div>
    </form>

    <h3 class="mt-5">Scheduled Applicants</h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant Name</th>
                    <th>Degree Program</th>
                    <th>Status</th>
                    <th>Interview Schedule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                    @if($application->schedule)
                        <tr class="animated fadeIn">
                            <td>{{ $application->id }}</td>
                            <td class="applicant-name">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                            <td class="degree-program">{{ $application->degree_program }}</td>
                            <td>
                                <span class="badge {{ $application->status == 'Accepted by College Coordinator' ? 'bg-success' : 'bg-info' }}">
                                    {{ $application->status == 'Accepted by College Coordinator' ? 'Qualified' : $application->status }}
                                </span>
                            </td>
                            <td>
                                <strong>Date:</strong> {{ $application->schedule->interview_date }} <br>
                                <strong>Time:</strong> {{ $application->schedule->interview_time }} <br>
                                <strong>Location:</strong> {{ $application->schedule->interview_location }}
                            </td>
                            <td>
                            <a href="{{ route('schedule.reschedule', $application->schedule->id) }}" class="btn btn-warning">Reschedule</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('scheduleForm').addEventListener('submit', function(event) {
        let checkboxes = document.querySelectorAll('input[name="applicant_ids[]"]:checked');
        if (checkboxes.length === 0) {
            event.preventDefault();
            alert("Please select at least one applicant before scheduling.");
        }
    });

    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        document.querySelectorAll('tbody tr').forEach(row => {
            let name = row.querySelector('.applicant-name').textContent.toLowerCase();
            let degree = row.querySelector('.degree-program').textContent.toLowerCase();
            row.style.display = (name.includes(filter) || degree.includes(filter)) ? '' : 'none';
        });
    });
</script>
@endsection
