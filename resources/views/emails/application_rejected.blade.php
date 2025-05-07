<!DOCTYPE html>
<html>
<head>
    <title>Application Rejected</title>
</head>
<body>
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="cid:logo.png" alt="System Logo" style="max-width: 200px;">
    </div>
    
    <p>Dear {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }},</p>

    <p>We regret to inform you that your application has been rejected.</p>
    
    <p>If you have any questions, feel free to contact us.</p>
    
    <p>Best regards,</p>
    <p>Eteeap Office</p>
    
</body>
</html>
