<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicaciones;

class UbicacionesController extends Controller
{
    //

    public function getEstados(){
        try {
            return Ubicaciones::allEstados();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getMunicipiosFromEdo($edo_id){
        try {
            return Ubicaciones::municipiosEdo($edo_id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getLocalidadesFromMun($mun_id){
        try {
            return Ubicaciones::localidadesMun($mun_id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function nuevoEstado(Request $request){
        $estado = $request->input('estado');
        
        Ubicaciones::agregarEstado($estado);
        return true;
    }

    public function nuevoMunicipio(Request $request){
        $estado_id = $request->input('edo_id');
        $municipio = $request->input('municipio');

        Ubicaciones::agregarMunicipio($estado_id, $municipio);
        return true;

    }

    public function nuevaLocalidad(Request $request){
        $mun_id = $request->input('mun_id');
        $localidad = $request->input('localidad');
        $clave_loc = $request->input('cve_localidad');

        Ubicaciones::agregarLocalidad($mun_id, $localidad, $clave_loc);
    }

    public function getClaveLocalidad($localidad_id){
        return Ubicaciones::getClaveLocalidad($localidad_id);
    }

}
