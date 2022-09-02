<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'id' => $row[0],
            'b' => $row[1],
            'c' => $row[2],
            'd' => $row[3],
            'e' => $row[4],
            'f' => $row[5],
            'g' => $row[6],
            'h' => $row[7],
            'i' => $row[8],
            'j' => $row[9],
        ]);
    }
}
