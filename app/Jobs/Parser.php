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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
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

        foreach ($names as $key => $name) {
            $listCards[$key]['name'] = trim($name->nodeValue);
            $listCards[$key]['price'] = preg_replace('/[^0-9]/', '', $prices[$key]->nodeValue)/100;
            $listCards[$key]['desc'] = trim($descs[$key]->nodeValue);
        }

        Card::insert($listCards);
        return 0;

        // Parser::dispatch(); - отправка в очередь
    }
}
