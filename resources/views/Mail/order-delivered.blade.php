<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body>
    <h3>{{ $mailMessage }}</h3>
    <p>Your package has been delivered to your preferred safe place.</p>
    <p>If you want more information or need assistance, check our contact Administrator</p>
    <p>Thank you for choosing us.</p>
    <br>
    <br>
    <p>Regards</p>
    <h4>{{ config('app.name') }}</h4>
</body>
</html>
