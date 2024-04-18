<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body>
    <h4>Ka-Ukay Order Request</h4>
    <p>{{ $mailMessage }}</p>
    <br>
    <br>
    <h4>Customer Email: {{ ucfirst(trans($sender)) }}</h4>
</body>
</html>
