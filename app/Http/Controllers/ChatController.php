<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
        $login = Auth::user()->login;

        $messages = DB::table('messages')
            ->join('users', 'messages.from_user', '=', 'users.id')
            ->select(
                'messages.from_user',
                'messages.message',
                'messages.sent_at',
                'users.login',
                'users.avatar')
            ->where('to_user', '1')
            ->orderBy('sent_at', 'asc')
            ->get();

        return view('chat', compact('login', 'messages'));
    }
}
