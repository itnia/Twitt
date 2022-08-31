<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Data;

class ParserCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parcerCSV {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing CSV file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arr = [];
        $arrData = [];
        $nameFile = $this->argument('file');
        $csv = fopen('D:\Code\Twitt\\'.$nameFile.'.csv', "r");
        while (($data = fgetcsv($csv)) !== FALSE) {

            $arrData['id'] = $data[0];
            $arrData['b'] = utf8_encode($data[1]);
            $arrData['c'] = $data[2];
            $arrData['d'] = $data[3];
            $arrData['e'] = $data[4];
            $arrData['f'] = $data[5];
            $arrData['g'] = $data[6];
            $arrData['h'] = $data[7];
            $arrData['i'] = $data[8];
            $arrData['j'] = $data[9];
            
            //$arr[] = $arrData;
            Data::create($arrData);
        }
        //var_dump($arr);
        //Data::create($arr);

        fclose($csv);
        return 0;
    }
}
