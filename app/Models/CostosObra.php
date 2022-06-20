<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostosObra extends Model
{
    use HasFactory;
    protected $table = "obras_costos";

    public static function updateContent($data, $obra_id){
        try {

            CostosObra::where('obra_id', $obra_id)->delete();

            foreach($data as $elem){
                $test = CostosObra::insert($obra_id, $elem);

            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function insert($obra_id, $element){
        try {
            $costo = new CostosObra;
            $costo->obra_id = $costo->checkForNull($obra_id);
            $costo->fuente_f_id = $costo->checkForNull($element->fuentef_id);
            $costo->concepto_costo_id = $costo->checkForNull($element->concepto_costo_id);
            $costo->fuentef_text = $costo->checkForNull($element->fuentef_text);
            $costo->concepto_text = $costo->checkForNull($element->concepto_text);
            $costo->monto = $costo->checkForNull($element->monto);
            $costo->save();

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getCostosByObra($obra_id){
        try {
            $costos = CostosObra::where('obra_id', $obra_id)->get();
            if ( count($costos) > 0) return json_encode($costos);
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
