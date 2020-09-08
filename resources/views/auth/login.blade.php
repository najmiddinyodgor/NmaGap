<!doctype html>
<html lang=lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NmaGap | Authorization</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="form">

<h1>NmaGap?!!</h1>

<div>
    <form action="{{route('login')}}" method="post">
        @csrf
        <p>
            <label for="email">Login:</label>
            <input type="text" id="login" name="login" placeholder="Login" required>
            @error('login')
            <span class="error-text">{{$message}}</span>
            @enderror
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            @error('password')
            <span class="error-text">{{$message}}</span>
            @enderror
        </p>
        <p class="inline">
            <label >Remember me</label>
            <input type="checkbox" name="remember">
        </p>
        <p>
            <button type="Submit"><b>Send</b></button>
        </p>
    </form>
</div>

<p>
    <b>New to NmaGap?</b> Please <a href="{{route('register')}}">Register</a>
</p>

</body>
</html>
