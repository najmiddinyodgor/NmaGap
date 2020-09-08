<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NmaGap | @yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
<div class="container">
    <header class="header">@yield('header')</header>
    <main class="content">@yield('content')</main>
    <footer class="footer">Copyright &copy;2020 | All rights reserved</footer>
</div>

<script src="/js/app.js"></script>
</body>

</html>
