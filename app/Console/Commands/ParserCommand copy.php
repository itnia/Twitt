<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Card;

class ParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing  https://shop.by';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$url = $this->argument('url');        

        $html = file_get_contents("https://shop.by/noutbuki/");

        preg_match_all("/<div[^>]*ModelList__InfoModelBlock[^>]*?>(.*?)(<div class=\"ModelList__LinksBlock\">)/si", $html, $blocks);
        //print_r($blocks);

        $listCards = [];
        foreach ($blocks[0] as $block) {

            preg_match('/<span[^>]*name[^>]*?>(.*?)<\/a>/si', $block, $name);
            preg_match("/<span>(.*[0-9]*?)<span>/si", $block, $price);
            preg_match("/<div[^>]*ModelList__DescBlock[^>]*?>(.*?)<\/div>/si", $block, $desc);
            $listCards[] = [
                "name" => $name[1],
                "price" => preg_replace('/[^0-9]/', '', $price[1])/100,
                "desc" => trim($desc[1])
            ];
        }

        Card::insert($listCards);
        return 0;
    }
}
