<!doctype html>
<html lang=lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NmaGap | Registration</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="form">

<h1>NmaGap?!!</h1>
<div class="div">
    <form action="{{route('register')}}" method="post">
        @csrf
        <p>
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" placeholder="Login" value="{{old('login')}}" required>
            @error('login')
            <span class="error-text">{{$message}}</span>
            @enderror
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
            @error('email')
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
        <p>
            <label for="password_confirmation">Confirm password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
            @error('confirm')
            <span class="error-text">{{$message}}</span>
            @enderror
        </p>
        <p>
            <button type="Submit"><b>Send</b></button>
        </p>
    </form>
</div>

<p>
    <b>Already have account?</b> Please <a href="{{route('login')}}">Log in</a>
</p>

</body>
</html>
