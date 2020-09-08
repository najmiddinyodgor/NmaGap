@extends('layouts.app')

@section('title', 'Chat')

@section('header')
    <h1 class='header-text'>{{$login}} NmaGap?!!</h1>
    @include('inc.btngroup')
@endsection
@section('content')
    <button class="modal-btn popup-open" type="button" data-id="2" aria-label="Online users">
        Online users: 0
    </button>
    <div class="messages">
        @foreach($messages as $msg)
            @if($msg->from_user == \Illuminate\Support\Facades\Auth::id())
                @component('components.message', ['type' => 'msg-out', 'msg' => $msg])
                @endcomponent
            @else
                @component('components.message', ['type' => 'msg-in', 'msg' => $msg])
                @endcomponent
            @endif
        @endforeach
    </div>
        @component('components.write', ['route' => route('message.create', ['id' => 1])])@endcomponent

    <div class="popup" id="popup-1">
        <section class="search popup-wrap">
            <button class="popup-close" aria-label="Close info"></button>
            <textarea id="search" placeholder="Search user"></textarea>
            <div>No users</div>
        </section>
    </div>
    <div class="popup" id="popup-2">
        <section class="popup-wrap users">
            <button class="popup-close" aria-label="Close info"></button>
            <div class="users-wrap"></div>
        </section>
    </div>
@endsection
