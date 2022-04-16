<?php

namespace App\Imports;

use App\Models\SettlementType;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SettlementTypeImport implements ToCollection,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        try{
            foreach ($rows as $row)
            {
                SettlementType::firstOrCreate([
                    'key'       => $row['c_tipo_asenta'],
                    ],[
                    'key'       => $row['c_tipo_asenta'],
                    'name'      => $row['d_tipo_asenta']
                ]);
            }
        }catch(Exception $e){
            dd($e);
        }

    }
}
