<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use Carbon\Carbon;
use App\Models\CuencaTributaria;
use App\Models\CategoriaObra;
use App\Models\TipoObra;
use App\Models\CostosObra;
use App\Models\ComiteObra;

class ObrasController extends Controller
{
    //
    
    public function getObrasRegistros(){
        return Obra::obrasRegistros();
    }

    public function getCostosByObra($obra_id){
        return CostosObra::getCostosByObra($obra_id);
    }

    public function getComitebyObra($obra_id){
        return ComiteObra::getcomiteByObra($obra_id);
    }

    public function getAll(){
        try {
            $obras = Obra::todasObras();
            return $obras;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function countCategories(){
        return Obra::countCategories();
    }

    public function countTipos(){
        return Obra::countTipos();
    }

    public function getCuencaTributaria($localidad_id){
        return CuencaTributaria::getCuencaTributaria($localidad_id);
    }

    public function getCategoriasObra(){
        return CategoriaObra::getCategorias();
    }

    public function getTiposObra(){
        return TipoObra::getTiposObra();
    }

    public function nuevoTipoObra($tipo_obra){
        return TipoObra::storeNew($tipo_obra);
    }

    public function store(Request $request){
        try {
            // Parametros
            $desc = $this->checkForNull($request->input('desc'));
            $just = $this->checkForNull($request->input('just'));
            $paraje = $this->checkForNull($request->input('paraje'));
            $coord = $this->checkForNull($request->input('coordinador'));
            $edo_id = $this->checkForNull($request->input('edo_id'));
            $mun_id = $this->checkForNull($request->input('mun_id'));
            $localidad_id = $this->checkForNull($request->input('local_id'));
            $sist = $this->checkForNull($request->input('sistema'));
            $prog = $this->checkForNull($request->input('programa'));
            $convgral = $this->checkForNull($request->input('convgral'));
            $convobra = $this->checkForNull($request->input('convobra'));
            $coordn = $this->checkForNull($request->input('coordn'));
            $coorde = $this->checkForNull($request->input('coorde'));
            $benefdir = $this->checkForNull($request->input('benefdir'));
            $benefind = $this->checkForNull($request->input('benefind'));
            $jefeobra = $this->checkForNull($request->input('jefeobra'));
            $tipo_obra_id = $this->checkForNull($request->input('tipo_id'));
            $cat_obra_id = $this->checkForNull($request->input('cat_id'));
            $array_costos = $this->checkForNull($request->input('arreglo_costos'));
            $costo_total_obra = $this->checkForNull($request->input('costo_total_obra'));
            $array_comite = $this->checkForNull($request->input('arreglo_comite'));

            $data = json_decode($array_costos);
            $data_comite = json_decode($array_comite);
            
            // Informacion base Obra
            $new_obra_id = Obra::guardarNueva(
                $jefeobra, $coord, $desc, $just, $paraje, $edo_id, $mun_id, 
                $sist, $prog, $convgral, $convobra, $coordn, $coorde,
                $benefdir, $benefind, $tipo_obra_id, $cat_obra_id, $localidad_id, $costo_total_obra);
        
            // Guardar costos
            $check = true;
            //return $data;
            foreach ($data as $elem) {
                $check = CostosObra::insert($new_obra_id, $elem);
                //return "HOLA";
            }

            foreach ($data_comite as $elem){
                ComiteObra::insert($new_obra_id, $elem);
            }

            //return $check;
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function nuevaCuencaTributaria(Request $request){
        try {
            $localidad_id = $request->input('localidad_id');
            $cuenca = $request->input('cuenca_trib');
            CuencaTributaria::storeNewCuencaTributaria($localidad_id, $cuenca);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getFuentesF(){
        try {
            return Obra::getFuentesFin();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getConceptosObra(){
        try {
            return Obra::getConceptosDeObra();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function checkForNull($element){
        if( is_null($element) || !$element || $element == 'null' || $element == 'NULL' || $element== 'Null' || strlen($element) == 0 ){
            return null;
        }else{
            return $element;
        }
    }

}
