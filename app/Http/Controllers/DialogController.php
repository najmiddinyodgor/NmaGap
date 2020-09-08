<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DialogController extends Controller
{
    public function index($id) {
        $userId = Auth::id();

        if($id == 1 || $id == $userId) {
            return redirect()->back();
        }

        $messages = DB::table('messages')
            ->join('users', 'messages.from_user', '=', 'users.id')
            ->select(
                'messages.from_user',
                'messages.message',
                'messages.sent_at',
                'users.login',
                'users.avatar')
            ->where([
                ['from_user', $userId],
                ['to_user', $id]
            ])
            ->orWhere([
                ['from_user', $id],
                ['to_user', $userId]
            ])
            ->orderBy('sent_at', 'asc')
            ->get();

        $user = User::select('login', 'avatar', 'last_seen', 'id')->where('id', $id)->first();

        return view('dialog', compact('user', 'messages'));
    }
}
