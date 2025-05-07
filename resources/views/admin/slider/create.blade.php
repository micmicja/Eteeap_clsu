@extends('layouts.admin') 

@section('content')
<div class="container mt-5">
    <h2>Add Slider</h2>

    @if (session('success'))
        <script>
            Swal.fire('Success', '{{ session('success') }}', 'success');
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire('Error', '{{ session('error') }}', 'error');
        </script>
    @endif

    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>

        </div>
    
        <div class="form-group">
            <label>Upload Image:</label>
            <input type="file" name="image" class="form-control" required>
        </div>
    
        <button type="submit" class="btn btn-success">Upload</button>
    </form>
    
</div>
@endsection
