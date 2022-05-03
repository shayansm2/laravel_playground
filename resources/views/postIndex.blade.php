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
            font-family: Helvetica, sans-serif;
        }

        .column {
            margin: 0 auto;
            width: 50%;
            padding: 0 10px;
        }

        .row {
            margin: 0 -5px;
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        .card {
            margin: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<div class="text-center">
    <div class="row">
        <div class="column">
            @foreach ($posts as $post)
                <div class="card">
                    {!! $post['body'] !!}
                    <a href="/cms/{{$post['slug']}}">Continue...</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
