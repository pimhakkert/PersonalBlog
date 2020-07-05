<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Pim Hakkert</title>
    <link rel="stylesheet" href="https://fonts.xz.style/serve/inter.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body id="@yield('body_id')">
@include('partials.header-admin')
@yield('content')
@include('partials.footer-admin')
@yield('javascript')
</body>
</html>
