<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller{

    public function getIndex(){
        $notifications = Notification::paginate()->where('user_id', '=', Auth::user()->id);
        return view('notifications.notifications')->withNotifications($notifications->reverse());
    }

    public static function viewed($id, $user_id){
        $notif = Notification::find($id);
        $notif->is_view = true;
        $notif->save();

        $user = User::find($user_id);
        $user->notifications = 0;
        $user->save();

    }

}
