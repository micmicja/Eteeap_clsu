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
        @php
    $degreeProgram = is_array($application->degree_program)
        ? implode(', ', $application->degree_program)
        : (json_decode($application->degree_program)[0] ?? $application->degree_program);
@endphp

<td class="degree-program">
    {{ $degreeProgram }}
   
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
    {{ $degreeProgram }}
   
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
                                <a href="{{ route('schedule.reschedule', $application->schedule->id) }}" class="btn btn-warning btn-sm">Reschedule</a>
                                <form action="#" method="POST" style="display:inline-block;" onsubmit="event.preventDefault(); showApproveModal({{ $application->id }});">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $application->id }}">
                                    Reject
                                </button>
                            </td>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal-{{ $application->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="rejectForm" action="{{ route('assessor.application.reject', $application->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rejectModalLabel">Reject Application</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="remarks" class="form-label">Please enter remarks for rejection:</label>
          <textarea class="form-control" id="remarks" name="remarks" required></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Confirm Reject</button>
        </div>
      </div>
    </form>
  </div>
</div>

                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editDegreeModal" tabindex="-1" aria-labelledby="editDegreeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="editDegreeForm">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editDegreeModalLabel">Edit Degree Program</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="application_id" id="editApplicationId">
          <div class="mb-3">
            <label for="degreeProgram" class="form-label">Degree Program</label>
            <input type="text" class="form-control" name="degree_program" id="degreeProgram">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="approveForm" method="POST" action="{{ route('accepted_applicants.approve') }}">
      @csrf
      <input type="hidden" name="application_id" id="approveApplicationId">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="approveModalLabel">Approve Application</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="course">Select CLSU Course</label>
              <select name="course" id="course" class="form-control" required>
                  <option value="">-- Select a Course --</option>
                  <option value="BSIT">BS in Information Technology (BSIT)</option>
                  <option value="BSCS">BS in Computer Science (BSCS)</option>
                  <option value="BSBA_HRDM">BS in Business Administration – HRDM</option>
                  <option value="BSBA_MKTG">BS in Business Administration – Marketing</option>
                  <option value="BSED_ENG">BSED in English</option>
                  <option value="BSED_SCI">BSED in Science</option>
                  <option value="BEED">Bachelor of Elementary Education (BEED)</option>
                  <option value="BSN">BS in Nursing (BSN)</option>
                  <option value="BSA">BS in Agriculture (BSA)</option>
                  <option value="BSE">BS in Engineering (BSE)</option>
                  <!-- Add more courses as needed -->
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Confirm Approve</button>
        </div>
      </div>
    </form>
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
    
    document.querySelectorAll('.editDegreeBtn').forEach(button => {
    button.addEventListener('click', function () {
        const appId = this.dataset.id;
        const degree = this.dataset.degree;

        document.getElementById('editApplicationId').value = appId;
        document.getElementById('degreeProgram').value = degree;

        // Update form action URL
        document.getElementById('editDegreeForm').action = `/admin/applications/${appId}/update-degree`;

        // Show modal (Bootstrap 5)
        let modal = new bootstrap.Modal(document.getElementById('editDegreeModal'));
        modal.show();
    });
        });

function showApproveModal(applicationId) {
    document.getElementById('approveApplicationId').value = applicationId;
    var approveModal = new bootstrap.Modal(document.getElementById('approveModal'));
    approveModal.show();
}
</script>
@endsection
@section('scripts')
<!-- Use CDN to ensure JS loads correctly -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
