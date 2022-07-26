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
        // отоброжение в профиле только своих сообщений и коментариев
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
        // render удалить после подключения ajax
        if(isset($request->message_id)){
            return view('status', [
                'message' => Message::find($request->message_id),
                'comments' => Message::where('message_id', '=', $request->message_id)->orderBy('id', 'desc')->get()
            ]);
        }
    }


    public function show(Request $request, $user, $id)
    {
        // отоброжение одного сообщения
        return view('status', ['message' => Message::find($id)]);
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
