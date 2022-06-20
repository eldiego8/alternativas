<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeneficiadosDirectos;


class BeneficiadosDirectosController extends Controller
{
    public function getBeneficiadosDirectosForObra($obra_id){
        $data = BeneficiadosDirectos::getBenefDirectosForObra($obra_id);
        return $data;
    }
}
