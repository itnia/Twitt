<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\Csv\Reader;
use App\Models\Data;

class ParserNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parserNew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parser';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $csv = Reader::createFromPath('D:\Code\Twitt\SampleCSV.csv', 'r');
        $records = $csv->getRecords();

        foreach ($records as $record) {
            // потому что нет загаловкав в таблице CSV
            Data::create([
                'id' => $record[0],
                'b' => utf8_encode($record[1]),
                'c' => $record[2],
                'd' => $record[3],
                'e' => $record[4],
                'f' => $record[5],
                'g' => $record[6],
                'h' => $record[7],
                'i' => $record[8],
                'j' => $record[9],
            ]);
        }
        return 0;
    }
}
