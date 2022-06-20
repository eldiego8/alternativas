<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiadosDirectos extends Model
{
    use HasFactory;
    protected $table = 'beneficiados_directos';

    public static function getBenefDirectosForObra($obra_id){
        try {
            
            $data = json_encode(BeneficiadosDirectos::where('obra_id', $obra_id));
            if($data)
                return $data;
            else
                return false;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function insert($obra_id, $elem){
        try {
            $benef = new BeneficiadosDirectos();
            $benef->obra_id = $obra_id;
            $benef->nombre = $elem->nombre;
            $benef->direccion = $elem->direccion;
            $benef->descripcion = $elem->descripcion;
            $benef->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
