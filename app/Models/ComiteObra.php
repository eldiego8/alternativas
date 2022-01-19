<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteObra extends Model
{
    use HasFactory;
    protected $table = "comite_obras";

    public static function insert($obra_id, $data){
        try {
            $comite = new ComiteObra;
            $comite->obra_id = $comite->checkForNull($obra_id);
            $comite->nombre = $comite->checkForNull($data->nombre);
            $comite->cargo = $comite->checkForNull($data->cargo);
            $comite->save();

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getComiteByObra($obra_id){
        try {
            $comite = ComiteObra::where('obra_id', $obra_id)->get();
            if ( count($comite) > 0) return json_encode($comite);
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
