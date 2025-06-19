@extends('layouts.admin') 

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">System Settings</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="system_domain">System Domain</label>
            <input type="text" name="system_domain" id="system_domain" class="form-control" 
                   value="{{ $settings['system_domain'] ?? '' }}" placeholder="e.g. http://Eteeap">
        </div>
        
        <div class="mb-4">
            <label class="block font-medium">System Title</label>
            <input type="text" name="system_title" value="{{ old('system_title', $settings['system_title'] ?? '') }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block font-medium">System Logo</label>
            <input type="file" name="system_logo" class="w-full border rounded p-2">

            @if(!empty($settings['system_logo']))
                <div class="mt-2">
                    <img src="{{ asset($settings['system_logo']) }}" alt="Logo" class="h-20">
                </div>
            @endif
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded">
            Save Settings
        </button>
    </form>
</div>
@endsection
