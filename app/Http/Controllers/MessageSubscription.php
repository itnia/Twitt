<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class MessageSubscription extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $subscriptions = Subscription::where('user_id', Auth::id())->get();
        $arr = [Auth::id()];
        foreach ($subscriptions as $subscription){
            $arr[] = $subscription->subscription_id;
        }
        $messages = Message::whereNull('message_id')->whereIn('user_id', $arr)->orderBy('id', 'desc')->get();

        return view('sections.message_group', ['messages' => $messages]);
    }
}
