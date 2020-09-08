<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function updateStatus(Request $request) {
        User::find(Auth::id())->update(['last_seen' => Carbon::now()->toDateTimeString()]);
        return response('OK');
    }

    public function getOnlineUsers() {
        $time = time() - 10;
        $users = User::select('id', 'login', 'avatar')
                        ->where('last_seen', '>=',  Carbon::createFromTimestamp($time)->toDateTimeString())
                        ->where('id', '!=', Auth::id())
                        ->get();
        return response($users);
    }

    public function searchUsers() {
        $value = request()->user;
        if($value != '') {
            $users = User::select('id', 'login', 'avatar')
                ->where('login', 'like', $value.'%')
                ->where('id', '!=', 1)
                ->get();
        } else $users = '';
        return response($users);
    }

    public function profile() {
        $user = Auth::user();
        return view('profile', ['login' => $user->login, 'avatar' => $user->avatar]);
    }

    public function changeAvatar(Request $request) {
        $avatar = Auth::user()->avatar;
        if($request->hasFile('avatar')) {
            if($avatar !== 'default.png') {
                Storage::delete('images/'.$avatar);
            }

            $filename = Auth::id().'.png';
            $path = storage_path('app/public/images/'. $filename);

            $image = Image::make($request->file('avatar')->path());
            $image->resize(60, 60)
                ->encode('png', 80)
                ->save($path, 100);

            User::where('id', Auth::id())->update(['avatar' => $filename]);
        }

        $request->session()->flash('succes-avatar', 'Avatar has changed succesfully');
        return redirect()->back();
    }

    public function changeLogin(Request $request) {
        $this->validate($request, [
            'login' => ['required', 'string', 'alpha_num', 'between:5,15', 'unique:users,login']
        ]);

        User::where('id', Auth::id())->update(['login' => $request->login]);

        $request->session()->flash('succes-login', 'Login has changed succesfully');
        return redirect()->back();
    }
}
