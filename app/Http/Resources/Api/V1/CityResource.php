<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Variable para almacenar los settlements
        $settlementsList = [];

        foreach ($this->resource as $key => $value) {
            array_push($settlementsList,[
                'key'                   =>  $value->settlement->key,
                'name'                  =>  $value->settlement->name,
                'zone_type'             =>  $value->settlement->zone_type,
                'settlement_type'       =>  [
                    'name'              =>  $value->settlement->settlement_type->name,
                ]
            ]);
        }

        return [
            'zip_code'                  =>  $this->resource[0]->zip_code,
            'locality'                  =>  $this->resource[0]->locality,
            'federal_entity'            =>  [
                'key'                   =>  $this->resource[0]->federal_entity->key,
                'name'                  =>  $this->resource[0]->federal_entity->name,
                'code'                  =>  $this->resource[0]->federal_entity->code,
            ],
            'settlements'               =>  $settlementsList,
            'municipality'              =>  [
                'key'                   =>  $this->resource[0]->municipality->key,
                'name'                  =>  $this->resource[0]->municipality->name,
            ]
        ];
    }

}
