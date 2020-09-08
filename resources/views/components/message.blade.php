<div class='msg {{$type}}'>
    <div class='msg-wrap'>
        <a href='/dialog/{{$msg->from_user}}'></a>
        <p class='msg-photo avatar'>
            <img src='/storage/images/{{$msg->avatar}}' alt='user photo'>
        </p>
        <p class='primary-text msg-text'>{{$msg->message}}</p>
    </div>
    <div class='msg-wrap'>
        <h3 class='secondary-text'>{{$msg->login}}</h3>
        <span class='secondary-text'>{{\Carbon\Carbon::parse($msg->sent_at)->format('H:i, M d')}}</span>
    </div>
</div>
