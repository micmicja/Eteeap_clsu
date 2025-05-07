@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-4">Terms and Conditions</h1>
    <div class="bg-white p-4 rounded shadow mb-6">
        <p>
            Please read and accept the terms to continue.
        </p>
       
    </div>

    <form method="POST" action="{{ route('terms.accept') }}">
        @csrf
        <label class="flex items-center mb-4">
            <input type="checkbox" name="agree" required>
            <span class="ml-2">I agree to the Terms and Conditions</span>
        </label>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Continue
        </button>
    </form>
</div>
@endsection
