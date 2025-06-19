    @extends('layouts.admin')

@section('content')
@php
    use Carbon\Carbon;
    // Get current date
    $today = Carbon::now();
    $startOfWeek = $today->startOfWeek();
    $weekDates = [];

    for ($i = 0; $i < 5; $i++) {
        $weekDates[$i] = $startOfWeek->copy()->addDays($i);
    }
@endphp

<div class="container">
    <h2>{{ isset($schedule) ? 'Reschedule Interview' : 'Interview Schedule' }}</h2>
    <p>Select a time slot and enter a location for the interview.</p>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ isset($schedule) ? route('schedule.reschedule', $schedule->id) : route('schedule.store') }}" method="POST">
        @csrf
        @if(isset($schedule)) @method('POST') @endif

        <div class="form-group">
            <label for="location">Interview Location:</label>
            <input type="text" name="location" id="location" class="form-control" required value="{{ $schedule->interview_location ?? old('location') }}">
        </div>

        <h4>Selected Applicants</h4>
        <ul>
            @foreach($applicants as $applicant)
                <li>
                    <input type="hidden" name="applicant_ids[]" value="{{ $applicant->id }}">
                    {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}
                </li>
            @endforeach
        </ul>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Time Slot</th>
                        @foreach ($weekDates as $date)
                            <th>{{ $date->format('l, M d') }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach(["8:00 AM - 10:00 AM", "10:00 AM - 12:00 PM", "1:00 PM - 2:00 PM", "3:00 PM - 4:00 PM"] as $time)
                    <tr>
                        <td><strong>{{ $time }}</strong></td>
                        @foreach ($weekDates as $date)
                            <td>
                                <input type="radio" class="schedule-checkbox" name="schedule[date_time]"
                                    value="{{ $date->toDateString() }}|{{ $time }}"
                                    @if(isset($schedule) && $schedule->interview_date == $date->toDateString() && $schedule->interview_time == $time) checked @endif
                                    required>
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <button type="submit" class="btn btn-{{ isset($schedule) ? 'warning' : 'primary' }}">
            {{ isset($schedule) ? 'Confirm Reschedule' : 'Submit Schedule' }}
        </button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkboxes = document.querySelectorAll(".schedule-checkbox");
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function () {
                checkboxes.forEach(cb => {
                    if (cb !== this) cb.checked = false;
                });
            });
        });
    });
</script>
@endsection
