<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
    body {
        background-image: linear-gradient(to bottom, rgb(0, 3, 0), rgba(124, 124, 124, 0.15)),
                          url("{{ asset('images/background.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        margin: 0;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
    }
    .content {
        font-family: 'Tahoma', sans-serif;
        font-size: 35px;
        font-weight: bold;
        text-align: center;
        letter-spacing: -0.5px; 
    }
</style>

</head>
<body>
    <div class="content">
        <h1>TS Spa & Grooming Lounge</h1>
        <p>"Laravel Backend"</p>
    </div>
</body>
</html>
