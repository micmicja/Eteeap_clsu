@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    <!-- Display validation errors (if any) -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
    
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Applicant</option>
                <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Admin</option>
                <option value="3" {{ old('role', $user->role) == 3 ? 'selected' : '' }}>Assessor</option>
                <option value="4" {{ old('role', $user->role) == 4 ? 'selected' : '' }}>Department Coordinator</option>
                <option value="5" {{ old('role', $user->role) == 5 ? 'selected' : '' }}>College Coordinator</option>
            </select>
        </div>
        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-success">Save Changes</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
    
</div>
@endsection
