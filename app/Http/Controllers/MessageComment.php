<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageComment extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        //
        $comments = Message::where('message_id', '=', $id)->orderBy('id', 'desc')->get();
        return view('sections.message_subscription', ['messages' => $comments]);
    }
}
