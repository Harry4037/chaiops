<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chaiops</title>
    </head>
    <body>
        <div>
            Thank you for Book The Table for Chaiops.<br>
        {{$data['table']}}<br>
        {{$data['occassion']}} <br>
        {{$data['name']}}<br>
        {{$data['email']}} <br>
        {{$data['message']}} <br>

        </div>
    </body>
</html>
