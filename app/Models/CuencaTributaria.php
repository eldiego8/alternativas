<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuencaTributaria extends Model
{
    use HasFactory;
    protected $table = "cuenca_tributaria";

    public static function getCuencaTributaria($localidad_id){
        return CuencaTributaria::where('localidad_id', $localidad_id)->limit(1)->get();
    }

    public static function storeNewCuencaTributaria($localidad_id, $cuenca_nombre){
        try {

            $cuenca = new CuencaTributaria();
            $cuenca->localidad_id = $localidad_id;
            $cuenca->c_tributaria = $cuenca_nombre;

            $cuenca->save();

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
