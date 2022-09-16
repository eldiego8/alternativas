<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormatosDocsController extends Controller
{
    function createFormat(){

    }

    public function getAllFormats(){
        return null;
    }

    public function storeFormat(Request $request){
        return json_decode($request->input('payload'));
    }
}
