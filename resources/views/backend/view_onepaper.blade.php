<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $ecoleCreds->nom }} | التصرف في الوثائق الإدارية</title>
</head>
<body>
    <iframe src="{{ asset('files/'.$paper->file) }}"></iframe>
</body>
</html>
