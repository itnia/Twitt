<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Subscription;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {
        // отоброжать все сообщения по подписке и свои
        $subscriptions = Subscription::where('user_id', Auth::id())->get();
        $arr = [Auth::id()];
        foreach ($subscriptions as $subscription){
            $arr[] = $subscription->subscription_id;
        }
        $messages = Message::whereNull('message_id')->whereIn('user_id', $arr)->orderBy('id', 'desc')->get();

        return view('home', ['messages' => $messages]);
    }


    public function store(Request $request)
    {       
        // сохронение сообщения и коментария
        $request->validate([
            'message' => 'required',
        ]);
        $message = new Message;
        $message->message = $request->message;
        $message->user_id = Auth::id();
        $message->message_id = $request->message_id;
        $message->save();
        if(isset($request->message_id)){
            return view('status', [
                'message' => Message::find($request->message_id),
                'comments' => Message::where('message_id', '=', $request->message_id)->orderBy('id', 'desc')->get()
            ]);
        }
        return redirect()->route('home');
    }


    public function show(Request $request, $user, $id)
    {
        // отоброжение одного сообщения с коментариями
        return view('status', ['message' => Message::find($id), 'comments' => Message::where('message_id', '=', $id)->orderBy('id', 'desc')->get()]);
    }


    public function update(Request $request, $id)
    {
        // без реализации - нет необходимости
    }


    public function destroy($id)
    {
        // удаление сообщения
    }

    public function like($id)
    {
        if(!($like = Like::where('message_id', '=', $id)
        ->where('user_id', '=', Auth::id())
        ->first())) {
            $message = Message::find($id);
            $message->likes += 1;
            $message->save();
            Like::create([
                'user_id' => Auth::id(),
                'message_id' => $id
            ]);
        } else {
            $message = Message::find($id);
            $message->likes -= 1;
            $message->save();
            $like->delete();
        }
        return redirect()->route('home');
    }
}
