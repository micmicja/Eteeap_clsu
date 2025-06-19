@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Slider List</h2>

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

    <a href="{{ route('admin.slider.create') }}" class="btn btn-success mb-3">Add New Slider</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sliders as $slider)
                <tr>
                    <td>
                        @if ($slider->image_path && file_exists(public_path($slider->image_path)))
                            <img src="{{ asset($slider->image_path) }}" width="100" alt="Slider Image">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $slider->title }}</td>
                    <td>
                        @if ($slider->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this slider?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No sliders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You can't undo this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });

        return false;
    }
</script>
@endsection