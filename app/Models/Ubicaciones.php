<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Ubicaciones extends Model
{
    use HasFactory;

    public static function allEstados(){
        try {
            return DB::table('estados')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function municipiosEdo($edo_id){
        try {
            return DB::table('municipios')->where('estado_id',$edo_id)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function localidadesMun($mun_id){
        try {
            return DB::table('localidades')->where('municipio_id',$mun_id)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function agregarEstado($estado){
        try {
            DB::table('estados')->insert([
                'estado' => $estado
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function agregarMunicipio($estado_id, $municipio){
        try {
            DB::table('municipios')->insert([
                'municipio' => $municipio,
                'estado_id' => $estado_id
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function agregarLocalidad($municipio_id, $localidad, $cve_localidad){
        try {
            DB::table('localidades')->insert([
                'municipio_id' => $municipio_id,
                'localidad' => $localidad,
                'clave_localidad' => $cve_localidad
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getClaveLocalidad($localidad_id){
        try {
            return DB::table('localidades')->where('id', $localidad_id)->limit(1)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
