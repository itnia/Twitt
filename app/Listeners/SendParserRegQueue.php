<?php

namespace App\Listeners;

use App\Events\ParserProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Card;

class SendParserRegQueue implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ParserProcessed  $event
     * @return void
     */
    public function handle(ParserProcessed $event)
    {
        $card = new Card;

        $card->name = $event->list_card['name'];
        $card->price = $event->list_card['price'];
        $card->desc = $event->list_card['desc'];

        $card->save();
    }
}
