@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Slider</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
        </div>

        <div class="form-group">
            <label>Current Image</label><br>
            <img src="{{ asset($slider->image_path) }}" width="200">
        </div>

        <div class="form-group">
            <label>New Image (optional)</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Update Slider</button>
    </form>
</div>
@endsection
