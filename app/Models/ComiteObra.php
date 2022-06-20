<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteObra extends Model
{
    use HasFactory;
    protected $table = "comite_obras";

    public static function updateContent($data, $obra_id){
        try {
            $comite = ComiteObra::where('obra_id', $obra_id)->delete();
            
            if ($data != null && count($data) > 0){
                foreach($data as $item){
                    ComiteObra::insert($obra_id, $item);
                }
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getPresidente($obra_id){
        try {
            try {
                $comite = ComiteObra::where('obra_id', $obra_id)->where('cargo', 'like', '%residente%')->get();
                if ( count($comite) > 0) {
                    return json_encode($comite);
                }
                else
                    return null;
            } catch (\Throwable $th) {
                throw $th;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

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
            if ( count($comite) > 0) 
                return json_encode($comite);
             else 
                return null;
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
