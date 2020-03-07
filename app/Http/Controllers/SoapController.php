<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoapController extends Controller
{

    public function list(){
        try {
            $wsdlUrl = 'https://cvnet.cpd.ua.es/servicioweb/publicos/pub_gestespacios.asmx?WSDL';

            $client = new \SoapClient($wsdlUrl);

            $result = $client->wsedificiosuni([
                'plengua' => 'C'
            ])->wsedificiosuniResult->ClaseEdificiosUni;

            return response()->json($result);
        }
        catch(\Exception $e) {

            return response()->json($e->getMessage(), 500);
        }
    }

    public function object(){

        try{
            $wsdlUrl = 'https://cvnet.cpd.ua.es/servicioweb/publicos/pub_gestdocente.asmx?WSDL';

            $client = new \SoapClient($wsdlUrl);

            $e = $client->wsdatosasig([
                'plengua' => 'C',
                'pcurso' => '2010-11',
                'pcodasi' => '9244'
            ])->wsdatosasigResult->ClaseDatosAsig;

            return response()->json($e);
        }
        catch(SoapFault $fault) {

            return response()->json($e->getMessage(), 500);
        }
    }
}
