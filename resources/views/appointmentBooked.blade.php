<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px;
            background-color:rgb(5, 31, 58);
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header img {
            max-width: 100px;
        }
        .content {
            padding: 20px;
        }
        .content h4 {
            color: #333333;
        }
        .appointment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .appointment-table th, .appointment-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .appointment-table th {
            background-color:rgb(5, 31, 58);
            color: white;
        }
        .footer {
            text-align: center;
            padding: 8px;
            font-size: 14px;
            color: #666666;
            background: #f1f1f1;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>Appointment Confirmation</h3>
        </div>
        <div class="content">
            <h4>Dear {{ $appointment->user->name }},</h4>
            <p>Your appointment is confirmed for:</p>
            <table class="appointment-table">
                <tr>
                    <th>Detail</th>
                    <th>Information</th>
                </tr>
                <tr>
                    <td><strong>Date</strong></td>
                    <td>{{ $appointment['date'] }}</td>
                </tr>
                <tr>
                    <td><strong>Time</strong></td>
                    <td>{{ $appointment['time'] }}</td>
                </tr>
                <tr>
                    <td><strong>Staff</strong></td>
                    <td>{{ $appointment->staff->name }}</td>
                </tr>
                <tr>
                    <td><strong>Services</strong></td>
                    <td>{{ implode(', ', $appointment['services']->pluck('name')->toArray()) }}</td>
                </tr>
            </table>
            <p>Thank you for booking with us!</p>
        </div>
        <div class="footer">
            <p>&copy; 2025 TS Spa & Groomin Lounge. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
