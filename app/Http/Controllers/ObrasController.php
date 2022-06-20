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
use App\Models\ObraLog;
use Illuminate\Support\Facades\Storage;
use PDF;
use ZipArchive;
use Zip;
use File;



class ObrasController extends Controller
{
    //
    public function updateObra(Request $request){
        try {
            $general_info = json_decode($request->input('general_info'));
            $comite_info = json_decode($request->input('comite_info'));
            $costos_info = json_decode($request->input('costo_info'));
            $costo_total_obra = $this->setCostoTotalObra($costos_info);

            $obra_id = $general_info->obra_id;
            
            //Obra::updateContent($general_info);
            ComiteObra::updateContent($comite_info, $obra_id);
            CostosObra::updateContent($costos_info, $obra_id);
            Obra::updateCostoTotal($obra_id, $costo_total_obra);

            return true;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function makePdf($obra_id){
        try {
            $costos = CostosObra::getCostosByObra($obra_id);
            $comite = ComiteObra::getcomiteByObra($obra_id);
            $obra = Obra::FullObraById($obra_id);

            $pdf = PDF::loadView('pdf.obrageneral', [
                'obra' => $obra,
                'costos' => json_decode($costos),
                'comite' => json_decode($comite),
                'date' => date('Y-m-d')
                ]);
            return $pdf->download('test.pdf');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function makePdfInicio($obra_id, $paraje){
        try {
            //$costos = CostosObra::getCostosByObra($obra_id);
            //$comite = ComiteObra::getcomiteByObra($obra_id);
            $obra = Obra::FullObraById($obra_id);
            $presidente = ComiteObra::getPresidente($obra_id);
            $mes = '';

            $mes = $this->getMonthAsTextSpanish();

            $pdf = PDF::loadView('pdf.avisoinicio', [
                'obra' => $obra,
                'paraje' => $paraje,
                'date' => date('Y-m-d'),
                'mes' => $mes,
                'day' => date('d'),
                'anio' => date('Y'),
                'presidente' => json_decode($presidente)[0]
                ]);

            // Update status
            Obra::update_inicio($obra_id);

            return $pdf->download("test_inicio.pdf");
            //return $pdf->download('test.pdf');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function makePdfFin($obra_id, $paraje){
        try {
            //$costos = CostosObra::getCostosByObra($obra_id);
            //$comite = ComiteObra::getcomiteByObra($obra_id);
            $obra = Obra::FullObraById($obra_id);
            $mes = '';

            $mes = $this->getMonthAsTextSpanish();

            $pdf = PDF::loadView('pdf.avisotermino', [
                'obra' => $obra,
                'paraje' => $paraje,
                'date' => date('Y-m-d'),
                'mes' => $mes,
                'dia' => date('d'),
                'anio' => date('Y')
                ]);

            // Update status
            Obra::update_termino($obra_id);

            return $pdf->download("test_termino.pdf");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function makePdfConvenio($obra_id, $payload){
        try {
            $data = json_decode($payload);
            $costos = CostosObra::getCostosByObra($obra_id);
            $comite = ComiteObra::getcomiteByObra($obra_id);
            $presidente = ComiteObra::getPresidente($obra_id);
            $obra = Obra::FullObraById($obra_id);
            
            $mes = $this->getMonthAsTextSpanish();
            $pdf = PDF::loadView('pdf.convenioobra', [
                'obra' => $obra,
                'date' => date('Y-m-d'),
                'mes' => $mes,
                'dia' => date('d'),
                'anio' => date('Y'),
                'presidente' => json_decode($presidente)[0],
                'data' => $data,
                'comite' => json_decode($comite),
                'costos' => json_decode($costos)
                ]);

            // Update status
            //Obra::update_termino($obra_id);

            return $pdf->download("convenio_test.pdf");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
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
            $benefind = $this->checkForNull($request->input('benefind'));
            $jefeobra = $this->checkForNull($request->input('jefeobra'));
            $tipo_obra_id = $this->checkForNull($request->input('tipo_id'));
            $cat_obra_id = $this->checkForNull($request->input('cat_id'));
            $array_costos = $this->checkForNull($request->input('arreglo_costos'));
            $array_comite = $this->checkForNull($request->input('arreglo_comite'));
            $array_benefdir = $this->checkForNull($request->input('arreglo_beneficiarios_dir'));

            // Parametros
            $data_costos = json_decode($array_costos);
            $data_comite = json_decode($array_comite);
            $data_benefdir = json_decode($array_benefdir);
            $costo_total_obra = $this->setCostoTotalObra($data_costos);
            
            // Informacion base Obra
            $new_obra_id = Obra::guardarNueva(
                $jefeobra, $coord, $desc, $just, $paraje, $edo_id, $mun_id, 
                $sist, $prog, $convgral, $convobra, $coordn, $coorde,
                $benefind, $tipo_obra_id, $cat_obra_id, $localidad_id, $costo_total_obra);
        
            // Guardar costos
            $check = true;
            //return $data;

            // Refactor THIS URGENT !!!!
            foreach ($data_costos as $elem) {
                $check = CostosObra::insert($new_obra_id, $elem);
                //return "HOLA";
            }

            if(count($data_comite) > 1){
                foreach ($data_comite as $elem){
                    ComiteObra::insert($new_obra_id, $elem);
                }
            }else{
                ComiteObra::insert($new_obra_id, $data_comite);
            }


            if (count($data_benefdir) > 1){
                foreach ($data_benefdir as $elem){
                    BeneficiadosDirectos::insert($new_obra_id, $elem);
                }
            }
            else
                BeneficiadosDirectos::insert($new_obra_id, $data_benefdir);

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

    public function newLog(Request $request){
        try {
            $log = json_decode($request->input('payload'));
            $res = ObraLog::createLog($log);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getLogs($obra_id){
        try {
            return ObraLog::getLogs($obra_id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dropLog($log_id){
        try{
            return ObraLog::dropLog($log_id);
        }catch(\ Throwable $th){
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

    private function getMonthAsTextSpanish(){
        // Date formatting
        $mes = '';
        switch(date('n')){
            case '1': $mes = 'Enero'; break; case '2': $mes = 'Febrero'; break; 
            case '3': $mes = 'Marzo'; break; case '4': $mes = 'Abril'; break; 
            case '5': $mes = 'Mayo'; break; case '6': $mes = 'Junio'; break; 
            case '7': $mes = 'Julio'; break; case '8': $mes = 'Agosto'; break; 
            case '9': $mes = 'Septiembre'; break; case '10': $mes = 'Octubre'; break; 
            case '11': $mes = 'Noviembre'; break; case '12': $mes = 'Diciembre'; break; 
        }
        return $mes;
    }

    private function setCostoTotalObra($costos){
        try {
            $sum = 0;
            foreach($costos as $costo){
                $sum += $costo->monto;
            }
            return $sum;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
