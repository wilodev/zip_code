<?php

namespace App\Imports;

use App\Models\FederalEntity;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FederalEntityImport implements ToCollection,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            FederalEntity::firstOrCreate([
                'key'                   => $row['c_estado'],
                ],[
                'key'                   => $row['c_estado'],
                'name'                  => $row['d_estado'],
                'code'                  => $row['d_cp'],
            ]);
        }
    }
}
