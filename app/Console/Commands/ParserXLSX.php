<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

class ParserXLSX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:xlsx';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Excel::import(new DataImport, base_path('SampleXLSX.xlsx'));
        return 0;
    }
}
