<!DOCTYPE html>
<html>
<head>
    <title>New Appointment Booking</title>
</head>
<body>
    <h2>New Appointment Alert</h2>
    <p>Dear Spa Owner,</p>
    <p>A new appointment has been booked:</p>

    <ul>
        <li><strong>Date:</strong> {{ $appointment->date }}</li>
        <li><strong>Time:</strong> {{ $appointment->time }}</li>
        <li><strong>Customer:</strong> {{ $appointment->user->name }}</li>
        <li><strong>Staff:</strong> {{ $appointment->staff->name }}</li>
        <li><strong>Services:</strong> 
        @if(!empty($appointment['services']) && is_array($appointment['services']))
    @foreach($appointment['services'] as $service)
        <li>{{ $service }}</li>
    @endforeach
@else
    <li>No services selected</li>
@endif

        </li>
    </ul>

    <p>Please ensure the necessary arrangements are made.</p>
    <p>Best Regards,</p>
    <p><strong>Your Spa System</strong></p>
</body>
</html>
