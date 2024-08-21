<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333333;
            margin-bottom: 20px;
        }
        p {
            color: #666666;
            line-height: 1.5;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>Contact Form - Odzivi</h1>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Surname:</strong> {{ $surname }}</p>
    <p><strong>Message:</strong> {{ $messages }}</p>
</div>
</body>
</html>
