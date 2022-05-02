<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> کوئرا </title>

    <!-- Fonts -->
    <link href="https://v1.fontapi.ir/css/Vazir" rel="stylesheet">

    <style>
        body {
            font-family: 'Vazir', sans-serif;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="text-center">
    {{ $text }}
</div>
</body>
</html>
