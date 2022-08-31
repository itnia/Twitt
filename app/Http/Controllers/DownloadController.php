<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DownloadController extends Controller
{
    public function download () {
        // создать файл csv с данными из базы данных
        $fp = fopen('file.csv', 'w');
        $data = Data::all();
        $arr = $data->toArray();
        foreach ($arr as $fields) {
            fputcsv($fp, $fields);
        }

        return response()->download('file.csv');
    }
}
