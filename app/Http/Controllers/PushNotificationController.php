<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PusherBroadcast;

class PushNotificationController extends Controller
{
    public function index()
    {
        return view('notification');
    }

    public function sendNotification(Request $request)
    {
        $user = auth()->user()->id;
        $from_app = $request->from_app;
        $message = $request->message;
        $link = 'https://www.google.com';
        event(new PusherBroadcast($user, $from_app, $message, $link));
        return redirect('notification')->with('status', 'Event has been sent! ');
    }
}
