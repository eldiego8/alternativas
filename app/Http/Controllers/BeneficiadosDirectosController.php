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

    public function addBeneficiadoDirectoForObra(Request $request){
        $payload = json_decode($request->input('payload'));
        return $payload;
    }
}
