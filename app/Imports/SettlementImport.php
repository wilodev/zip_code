<?php

namespace App\Imports;

use App\Models\Settlement;
use App\Models\SettlementType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SettlementImport implements ToCollection,  WithHeadingRow
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
            $settlement_type = SettlementType::where('key', $row['c_tipo_asenta'])->first();
            Settlement::firstOrCreate([
                'key'                   => $row['id_asenta_cpcons'],
                ],[
                'key'                   => $row['id_asenta_cpcons'],
                'name'                  => $row['d_asenta'],
                'settlement_type_id'    => $settlement_type->id,
                'zone_type'             => $row['d_zona']
            ]);
        }
    }
}
