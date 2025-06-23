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
                                <td class="degree-program">
                                    <a href="#" class="edit-degree-program" data-id="{{ $application->id }}" data-degree="{{ $application->degree_program }}">
                                        {{ $application->degree_program }}
                                    </a>
                                </td>
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
                            <td class="degree-program">
                                <a href="#" class="edit-degree-program" data-id="{{ $application->id }}" data-degree="{{ $application->degree_program }}">
                                    {{ $application->degree_program }}
                                </a>
                            </td>
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

<!-- Degree Program Edit Modal -->
<div class="modal fade" id="editDegreeModal" tabindex="-1" aria-labelledby="editDegreeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDegreeModalLabel">Edit Degree Program</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editDegreeForm" method="POST" action="">
          @csrf
          <input type="hidden" name="applicant_id" id="editApplicantId">
          <div class="mb-3">
            <label for="degreeProgramInput" class="form-label">Degree Program</label>
            <input type="text" class="form-control" id="degreeProgramInput" name="degree_program" required>
          </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
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
@section('scripts')
<!-- Use CDN to ensure JS loads correctly -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '.edit-degree-program', function(e) {
        e.preventDefault();
        var applicantId = $(this).data('id');
        var degree = $(this).data('degree');
        $('#editApplicantId').val(applicantId);
        $('#degreeProgramInput').val(degree);
        // Set the form action dynamically
        $('#editDegreeForm').attr('action', `/admin/applicants/${applicantId}/degree-program`);
        var modal = new bootstrap.Modal(document.getElementById('editDegreeModal'));
        modal.show();
    });
});
</script>
@endsection

