<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\CityResource;

class CityController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($zip_code)
    {
        // Se realiza la busqueda del código zip
        $result = City::with([
            'federal_entity',
            'settlement',
            'settlement.settlement_type',
            'municipality'
            ])
            ->where('zip_code', $zip_code)
            ->get();
        // Se realiza la validación que tenemos un resultado
        if(count($result) > 0){
            // Se retorna la respuesta con el formato del recurso pero con data
            return new CityResource($result);
        }
        // Retornamos una respuesta de not found
        return response()->json(['message' => 'Zip Code Not Found'], 404);
    }


}
