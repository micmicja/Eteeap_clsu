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
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#acceptModal-{{ $application->id }}">
                                Accept
                            </button>
                           <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $application->id }}">
    Reject
</button>

<!-- Accept Modal -->
<div class="modal fade" id="acceptModal-{{ $application->id }}" tabindex="-1" aria-labelledby="acceptModalLabel-{{ $application->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('department.application.accept', $application->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="acceptModalLabel-{{ $application->id }}">Accept Application</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to accept this application?<br>
          <strong>Applicant:</strong> {{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}<br>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Confirm Accept</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal-{{ $application->id }}" tabindex="-1" aria-labelledby="rejectModalLabel-{{ $application->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form id="rejectForm" action="{{ route('assessor.application.reject', $application->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rejectModalLabel-{{ $application->id }}">Reject Application</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="remarks-{{ $application->id }}" class="form-label">Please enter remarks for rejection:</label>
          <textarea class="form-control" id="remarks-{{ $application->id }}" name="remarks" required></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Confirm Reject</button>
        </div>
      </div>
    </form>
  </div>
</div>

                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<!-- Use CDN to ensure JS loads correctly -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
