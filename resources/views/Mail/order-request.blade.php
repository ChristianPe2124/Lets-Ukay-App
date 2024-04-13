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
    <p>We will send you an email as soon as your parcel is on its way.</p>
    <br>
    <p>Thank you for your purchase,</p>
    <br>
    <p>Regards</p>
    <h4>{{ ucfirst(trans($sender)) }}</h4>
</body>
</html>
