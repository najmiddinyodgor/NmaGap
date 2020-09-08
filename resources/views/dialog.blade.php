@extends('layouts.app')

@section('title', 'Dialog')

@section('header')
    <div class="dialog-header">
        <a class="btn btn-back" href="/chat" aria-label="Back to chat">
            <svg x="0px" width="20px" height="20px" y="0px" viewBox="0 0 31.494 31.494"
                 style="enable-background:new 0 0 31.494 31.494;" xml:space="preserve">
            <path style="fill:#222;"
                  d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554  c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587  c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"/>
        </svg>

        </a>
        <div class="user-info">
            <p class="avatar">
                <img src="/storage/images/{{$user->avatar}}" alt='user photo'>
            </p>
            <dl>
                <dt class="primary-text">{{$user->login}}</dt>
                @if(time() - \Carbon\Carbon::parse($user->last_seen)->timestamp < 5000)
                    <dd class="succes-text">
                        online
                @else
                    <dd class="secondary-text">
                        last seen at {{\Carbon\Carbon::parse($user->last_seen)->format('H:i, M d')}}
                        @endif
                    </dd>
            </dl>
        </div>
    </div>
@endsection

@section('content')
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
        @component('components.write', ['route' => route('message.create', ['id' => $user->id])])@endcomponent
    <input type="hidden" id="id" value="{{$user->id}}">
@endsection
