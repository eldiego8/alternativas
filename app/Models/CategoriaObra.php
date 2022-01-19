<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaObra extends Model
{
    use HasFactory;
    protected $table = "categoria_obra";

    public static function getCategorias(){
        return CategoriaObra::all();
    }
}
