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
                                            <form action="{{ route('admin.application.reject', $application->id) }}" method="POST" style="display:inline;">
                                                @csrf @method('PUT')
                                                <button type="submit" class="btn btn-danger btn-xs">Reject</button>
                                            </form>
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rejectedApplications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                                        <td><span class="label label-danger">{{ $application->status }}</span></td>
                                        <td>
                                            <form action="{{ route('admin.application.unreject', $application->id) }}" method="POST" style="display:inline;">
                                                @csrf @method('PUT')
                                                <button type="submit" class="btn btn-warning btn-xs">Unreject</button>
                                            </form>
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
