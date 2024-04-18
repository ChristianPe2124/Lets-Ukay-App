<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body>
    <h4>Your Order Has been Shipped</h4>
    <p>{!! $mailMessage !!}</p>
    <br>
    <p>Best Regards,</p>
    <p>Shiela Dapilos-Pe</p>
    <p>Admin</p>
    <strong>{{ config('app.name') }}</strong>
    <p>+63-xxx-xxx-xxxx</p>
</body>
</html>
