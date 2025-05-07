<!-- resources/views/emails/reschedule_interview.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Rescheduled</title>
</head>
<body>
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="cid:logo.png" alt="System Logo" style="max-width: 200px;">
    </div>
    <h1>Dear {{ $applicant->first_name }} {{ $applicant->last_name }}</h1>
    <p>Your interview has been rescheduled to:</p>
    <p>Date: {{ $schedule->interview_date }}</p>
    <p>Time: {{ $schedule->interview_time }}</p>
    <p>Location: {{ $schedule->interview_location }}</p>
    <p>Best regards,</p>
    <p>The HR Team</p>
</body>
</html>
