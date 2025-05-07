<!DOCTYPE html>
<html>
<head>
    <title>Interview Scheduled</title>
</head>
<body>
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="cid:logo.png" alt="System Logo" style="max-width: 200px;">
    </div>
    <h2>Hello {{ $applicant->first_name }},</h2>
    <p>Your interview has been scheduled.</p>
    <p><strong>Date:</strong> {{ $scheduleDetails['date'] }}</p>
    <p><strong>Time:</strong> {{ $scheduleDetails['time'] }}</p>
    <p><strong>Location:</strong> {{ $scheduleDetails['location'] }}</p>
    <p>Best of luck!</p>
</body>
</html>
