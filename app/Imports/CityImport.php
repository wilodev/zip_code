<?php

namespace App\Imports;

use App\Models\City;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CityImport implements ToCollection,  WithHeadingRow
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
            // Se realiza la busqueda del id del federal_entity
            $federal_entity_id = FederalEntity::where('key', $row['c_estado'])->first()->id;
            // Se realiza la busqueda del id del settlement
            $settlement_id = Settlement::where('key', $row['id_asenta_cpcons'])->first()->id;
            // Se realiza la busqueda del id del municipality
            $municipality_id = Municipality::where('key', $row['c_mnpio'])->first()->id;
            // Se realiza la comprobación que los 3 id sean diferentes de null
            if ($federal_entity_id != null && $settlement_id != null && $municipality_id != null) {
                // Solo se crea si tenemos los 3 id
                City::firstOrCreate([
                    'zip_code'                  => $row['d_codigo'],
                    'settlement_id'             => $settlement_id,
                    ],[
                    'federal_entity_id'         => $federal_entity_id,
                    'settlement_id'             => $settlement_id,
                    'municipality_id'           => $municipality_id,
                    'zip_code'                  => $row['d_codigo'],
                    'locality'                  => $row['d_ciudad'],
                ]);
            }
        }
    }
}
