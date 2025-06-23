@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Applications</h5>
                </div>
                <div class="ibox-content">
                    
                    <!-- Flash Messages -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                    <!-- Search Bar -->
                    <input type="text" id="searchBar" class="form-control mb-3" placeholder="Search applicants...">
                    
                    <!-- Filter Buttons -->
                    <div class="btn-group mb-3">
                        <button class="btn btn-primary" onclick="showTab('pending')">Pending</button>
                        <button class="btn btn-success" onclick="showTab('accepted')">Accepted</button>
                        <button class="btn btn-danger" onclick="showTab('rejected')">Rejected</button>
                    </div>
                    
                    <!-- Pending Applications -->
                    <div id="pending" class="tab-content">
                        <h4>Pending Applications</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Applicant Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingApplications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                                        <td><span class="label label-primary">{{ $application->status }}</span></td>
                                        <td>
                                            <a href="{{ route('admin.application.view', $application->id) }}" class="btn btn-info btn-xs">View</a>
                                            <form action="{{ route('admin.application.accept', $application->id) }}" method="POST" style="display:inline;">
                                                @csrf @method('PUT')
                                                <button type="submit" class="btn btn-success btn-xs">Accept</button>
                                            </form>
                                           <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal">
    Reject
</button>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Accepted Applications -->
                    <div id="accepted" class="tab-content" style="display: none;">
                        <h4>Accepted Applications</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Applicant Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acceptedApplications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                                        <td>
                                            <span class="label label-success">{{ $application->status }}</span>
                        
                                            @if(Str::contains($application->status, 'Accepted by College Coordinator'))
                                                <span class="label label-warning">Ready for Interview</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmAccept(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You are about to accept this application.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, accept it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('accept-form-' + id).submit();
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function rejectConfirmation(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "This will reject the application and notify the applicant via email.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, reject it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('reject-form-' + id).submit();
            } else {
                Swal.fire({
                    title: "Cancelled",
                    text: "The application was not rejected.",
                    icon: "info",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    }
</script>

                    <!-- Rejected Applications -->
                    <div id="rejected" class="tab-content" style="display: none;">
                        <h4>Rejected Applications</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Applicant Name</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rejectedApplications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                                        <td><span class="label label-danger">{{ $application->status }}</span></td>
                                        <td>{{ $application->remarks }}</td>
                                        <td>
                                            <!-- Unreject Button -->
                                            <button type="button" class="btn btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#unrejectModal-{{ $application->id }}">
                                                Unreject
                                            </button>

                                            <!-- Unreject Modal -->
                                            <div class="modal fade" id="unrejectModal-{{ $application->id }}" tabindex="-1" aria-labelledby="unrejectModalLabel-{{ $application->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('admin.application.unreject', $application->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="unrejectModalLabel-{{ $application->id }}">Confirm Unreject</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to unreject this application?<br>
                                                                <strong>This action will move the application back to pending status.</strong>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-warning">Yes, Unreject</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');
        document.getElementById(tabName).style.display = 'block';
    }
    
    document.getElementById('searchBar').addEventListener('keyup', function () {
        let searchValue = this.value.toLowerCase();
        document.querySelectorAll('tbody tr').forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endsection
@section('scripts')
<!-- Use CDN to ensure JS loads correctly -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
