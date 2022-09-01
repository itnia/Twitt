<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\Parser;
use App\Events\ParserProcessed;

class ParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser';

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
        $url = 'https://shop.by/noutbuki/';
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/1.0.7");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        curl_close($ch);
        
        $domDocument = new \DOMDocument();
        @$domDocument->loadHTML($content);
        
        $xPath = new \DOMXPath($domDocument);

        $names = $xPath->query("//div[@class ='ModelList__NameBlock']");
        $prices = $xPath->query("//span[@class ='PriceBlock__PriceValue']");
        $descs = $xPath->query("//div[@class ='ModelList__DescBlock hidden-xs']");
        
        $listCard['name'] = trim($names[0]->nodeValue);
        $listCard['price'] = preg_replace('/[^0-9]/', '', $prices[0]->nodeValue)/100;
        $listCard['desc'] = trim($descs[0]->nodeValue);

        ParserProcessed::dispatch($listCard);
    }
}
