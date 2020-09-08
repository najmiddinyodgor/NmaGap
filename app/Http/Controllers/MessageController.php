<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function store(Request $request, $id)
    {
        Message::create([
            'from_user' => Auth::id(),
            'to_user' => $id,
            'message' => $request->get('message'),
            'sent_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->back();
    }

    public function get($id) {
        $time = time() - 5;
        $interval = Carbon::createFromTimestamp($time)->toDateTimeString();
        if($id == 1) {
            $messages = DB::table('messages')
                ->join('users', 'messages.from_user', '=', 'users.id')
                ->select(
                    'messages.from_user',
                    'messages.message',
                    'messages.sent_at',
                    'users.login',
                    'users.avatar')
                ->where([
                    ['to_user', $id],
                    ['sent_at', '>=', $interval]
                ])
                ->orderBy('sent_at', 'asc')
                ->get();
        } else {
            $messages = DB::table('messages')
                ->join('users', 'messages.from_user', '=', 'users.id')
                ->select(
                    'messages.from_user',
                    'messages.message',
                    'messages.sent_at',
                    'users.login',
                    'users.avatar')
                ->where([
                    ['to_user', Auth::id()],
                    ['from_user', $id],
                    ['sent_at', '>=', $interval]
                ])
                ->orderBy('sent_at', 'asc')
                ->get();
        }
        return response($messages);
    }
}
