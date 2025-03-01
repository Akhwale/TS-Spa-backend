<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h2>Appointment Confirmed</h2>
    <p>Dear {{ $appointment['user_name'] }},</p>
    <p>Your appointment is confirmed for:</p>
    <ul>
        <li><strong>Date:</strong> {{ $appointment['date'] }}</li>
        <li><strong>Time:</strong> {{ $appointment['time'] }}</li>
        <li><strong>Staff:</strong> {{ $appointment['staff_name'] }}</li>
        <li><strong>Services:</strong> {{ implode(', ', $appointment['services']->pluck('name')->toArray()) }}</li>

    </ul>
    <p>Thank you for booking with us!</p>
</body>
</html>
