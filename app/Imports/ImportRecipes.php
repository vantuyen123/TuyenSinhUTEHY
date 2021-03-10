<?php

namespace App\Imports;

use App\Models\studentModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportRecipes implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new studentModel([
            //
            'username' => $row[0],
            'age' => $row[1],
            'point' => $row[2],
        ]);
    }
}
