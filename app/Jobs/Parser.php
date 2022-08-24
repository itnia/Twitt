<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Card;

class Parser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $card = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($listCard)
    {
        $this->card = $listCard;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $card = new Card;
        
        $card->name = $this->card['name'];
        $card->price = $this->card['price'];
        $card->desc = $this->card['desc'];

        $card->save();

    }
}
