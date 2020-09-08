@extends('layouts.app')

@section('title', 'Profile')

@section('header')
    <h1 class='header-text'>Profile</h1>
@endsection

@section('content')
    <section class="profile">
        <form action="{{route('avatar')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p class="avatar">
                <img src="/storage/images/{{$avatar}}" alt='user photo'>
            </p>
            <label for="avatar" class="secondary-text">Change avatar:</label>
            <input type="file" id="avatar" accept="image/*" name="avatar" required>
            <button type="submit">Change</button>
            @error('avatar')
            <span class="error-text">{{$message}}</span>
            @enderror
            @if(session()->has('succes-avatar'))
                <span class="succes-text">{{session()->get('succes-avatar')}}</span>
            @endif
        </form>
        <form action="{{route('login')}}" method="post">
            @csrf
            @method('PUT')
            <label for="login" class="secondary-text">Change login:</label>
            <input type="text" id="login" name="login" value="{{$login}}" required>
            <button type="submit">Change</button>
            @error('login')
            <span class="error-text">{{$message}}</span>
            @enderror
            @if(session()->has('succes-login'))
                <span class="succes-text">{{session()->get('succes-login')}}</span>
            @endif
        </form>
    </section>
@endsection
