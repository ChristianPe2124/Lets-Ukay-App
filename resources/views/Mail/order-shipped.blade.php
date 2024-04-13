<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body>
    <h4>{{ $subject }}</h4>
    <p>{{ $mailMessage }}</p>
    <p>Please wait for 3-5 days of shipping.</p>
    <p>If you have an other inquiry please check the above contact Administrator.</p>
    <br>
    <p>Regards</p>
    <strong>{{ config('app.name') }}</strong>
</body>
</html>
