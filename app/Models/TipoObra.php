<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoObra extends Model
{
    use HasFactory;
    protected $table = "tipo_obra";

    public static function getTiposObra(){
        return TipoObra::all();
    }

    public static function storeNew($tipo_obra){
        try {
            $tipo = new TipoObra();
            $tipo->tipo = $tipo_obra;
            $tipo->save();
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }

    }


}
