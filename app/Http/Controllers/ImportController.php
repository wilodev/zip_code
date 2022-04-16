<?php

namespace App\Http\Controllers;

use App\Imports\CityImport;
use App\Imports\FederalEntityImport;
use App\Imports\MunicipalityImport;
use App\Imports\SettlementTypeImport;
use App\Imports\SettlementImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        // Primero se recorre  la carpeta para cargar los SettlementType
        $files = Storage::allFiles('zips');
        foreach ($files as $file)
        {
            // Primero se realiza el import de SettlementType
            Excel::import(new SettlementTypeImport , $file);
            // Segundo se realiza el import de Settlement
            Excel::import(new SettlementImport , $file);
            // Tercero se realiza el import de Municipality
            Excel::import(new MunicipalityImport , $file);
            // Cuarto se realiza el import de Municipality
            Excel::import(new FederalEntityImport, $file);
            // Quinto se agrega las ciudades
            Excel::import(new CityImport, $file);
        }
        return back();
    }
}
