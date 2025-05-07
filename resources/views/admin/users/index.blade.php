@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">User Management</h2>

    <!-- Search Bar -->
    <input type="text" id="searchBar" class="form-control mb-3" placeholder="Search users...">

    <!-- Filter Buttons -->
    <div class="btn-group mb-3">
        <button class="btn btn-secondary" onclick="filterUsers('all')">All Users</button>
        <button class="btn btn-primary" onclick="filterUsers('2')">Admin</button>
        <button class="btn btn-success" onclick="filterUsers('3')">Assessor</button>
        <button class="btn btn-warning" onclick="filterUsers('4')">Department Coordinator</button>
        <button class="btn btn-info" onclick="filterUsers('5')">College Coordinator</button>
    </div>

    <!-- Users Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="userTable">
            @php
                $roles = [
                    1 => 'Applicant',
                    2 => 'Admin',
                    3 => 'Assessor',
                    4 => 'Department Coordinator',
                    5 => 'College Coordinator',
                ];
            @endphp

            @foreach($users as $user)
                <tr data-role="{{ $user->role }}">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $roles[$user->role] ?? 'Unknown' }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- JavaScript for search and filter -->
<script>
    function filterUsers(role) {
        const rows = document.querySelectorAll('#userTable tr');
        rows.forEach(row => {
            if (role === 'all') {
                row.style.display = '';
            } else {
                row.style.display = row.getAttribute('data-role') === role ? '' : 'none';
            }
        });
    }

    document.getElementById('searchBar').addEventListener('keyup', function () {
        let searchValue = this.value.toLowerCase();
        document.querySelectorAll('#userTable tr').forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endsection
