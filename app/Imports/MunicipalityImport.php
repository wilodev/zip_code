<?php

namespace App\Imports;

use App\Models\Municipality;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class MunicipalityImport implements ToCollection,  WithHeadingRow
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
            Municipality::firstOrCreate([
                'key'                   => $row['c_mnpio'],
                ],[
                'key'                   => $row['c_mnpio'],
                'name'                  => $row['d_mnpio'],
            ]);
        }
    }
}
