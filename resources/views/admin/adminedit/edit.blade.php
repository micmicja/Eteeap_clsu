
@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit User</h5>
                </div>
                <div class="ibox-content">
                    
                
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                  
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Admin</option>
                                <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Assessor</option>
                                <option value="4" {{ $user->role == 4 ? 'selected' : '' }}>Department Coordinator</option>
                                <option value="5" {{ $user->role == 5 ? 'selected' : '' }}>College Coordinator</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="profile_image">Profile Image</label>
                            <input type="file" name="profile_image" class="form-control">
                            @if($user->profile_image)
                                <img src="{{ asset('storage/'.$user->profile_image) }}" alt="Profile Image" width="100" height="100">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
