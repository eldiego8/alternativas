<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Obra extends Model
{
    use HasFactory;
    protected $table = "obras";

    public static function todasObras(){
        try {
            return Obra::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function obrasRegistros(){
        try {
            
            $obras = Obra::leftJoin('estados', 'obras.estado_id', '=', 'estados.id')
                        ->leftJoin('cuenca_tributaria', 'obras.localidad_id', '=', 'cuenca_tributaria.localidad_id')
                        ->leftJoin('estado_autorizaciones', 'obras.edo_autorizacion_id', '=', 'estado_autorizaciones.id')
                        ->leftJoin('municipios', 'obras.municipio_id', '=', 'municipios.id')
                        ->leftJoin('localidades', 'obras.localidad_id', '=', 'localidades.id')
                        ->leftJoin('tipo_obra', 'obras.tipo_obra_id', '=', 'tipo_obra.id')
                        ->leftJoin('categoria_obra', 'obras.cat_obra_id', '=', 'categoria_obra.id')
                        ->leftJoin('situacion_obra', 'obras.situacion_id', '=', 'situacion_obra.id')
                        ->select('obras.id as obra_id','clave_obra', 'estados.estado', 'municipios.municipio', 'localidades.localidad', 'localidades.clave_localidad', 
                        'cuenca_tributaria.c_tributaria', 'tipo_obra.tipo', 'convenio_obra', 'convenio_general', 'categoria_obra.categoria', 
                        'situacion_obra.situacion', 'jefe_obra', 'coordinador', 'paraje', 'sistema', 'programa', 'beneficiado_directo', 
                        'beneficiado_indirecto', 'estado_autorizaciones.estado as edo_aut', 'coordenada_n', 'coordenada_e',
                        'descripcion', 'justificacion', 'fecha_inicio','total', 'fecha_termino', 'obras.created_at')
                        ->get();

            return $obras;
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function guardarNueva($jefe_obra, $coord, $desc, $just, $paraje, $edo_id, $mun_id, $sist, $prog, $convgral, $convobra, $coordn, $coorde, $benefdir, $benefind, $tipo_obra_id, $cat_obra_id, $localidad_id, $total_obra){
        try {

            $claveobra = Obra::getClaveObra();

            $obra  = new Obra();
            $obra->jefe_obra = $jefe_obra;
            $obra->coordinador = $coord;
            $obra->descripcion = $desc;
            $obra->justificacion = $just;
            $obra->paraje = $paraje;
            $obra->estado_id = $edo_id;
            $obra->municipio_id = $mun_id;
            $obra->sistema = $sist;
            $obra->programa = $prog;
            $obra->convenio_general = $convgral;
            $obra->convenio_obra = $convobra;
            $obra->coordenada_n = $coordn; $obra->coordenada_e = $coorde;
            $obra->localidad_id = $localidad_id;
            $obra->beneficiado_directo = $benefdir;
            $obra->beneficiado_indirecto = $benefind;
            $obra->clave_obra = now()->year.$claveobra;
            $obra->tipo_obra_id = $tipo_obra_id;
            $obra->edo_autorizacion_id = 3; // En espera
            $obra->cat_obra_id = $cat_obra_id;
            $obra->total = $total_obra;
            $obra->save();

            return $obra->id;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function addCostos($obra_id, $concepto_id, $fuente_id, $monto, $c_total){
        try{
            DB::table('obras_costos')->insert([
                'id' => null,
                'obra_id' => $obra_id,
                'fuente_f_id' => $fuente_id,
                'concepto_costo_id' => $concepto_id, 
                'monto' => $monto,
                'costo_total' => $c_total
            ]);

            return "hol";
            
        }catch (\Throwable $th){
            return $th;
        }
    }

    public static function getConceptosDeObra(){
        try {
            $conceptos = DB::table('conceptos_costo')->get();
            return $conceptos;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function getFuentesFin(){
        try {
            $fuentes = DB::table('fuentes_financieras')->get();
            return $fuentes;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    private static function getClaveObra(){
        $counter = Obra::all();
        $num = $counter->count();
        $num += 1;

        switch(strlen(strval($num))){
            case 1:
                return "000".$num;
                break;
            case 2:
                return "00".$num;
                break;
            case 3:
                return "0".$num;
                break;
            case 4:
                return $num;
                break;
            default:
                return $num;
                break;
        }
    }

    public static function countCategories(){
        try {
            DB::statement("set session sql_mode='' ");
            return Obra::rightJoin("categoria_obra", "obras.cat_obra_id", "=", "categoria_obra.id")
                    ->select("categoria_obra.categoria", DB::raw("COUNT(obras.cat_obra_id) as count"))
                    ->groupBy("categoria_obra.categoria")
                    ->get();
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function countTipos(){
        try {
            DB::statement("set session sql_mode='' ");
            return Obra::rightJoin("tipo_obra", "obras.tipo_obra_id", "=", "tipo_obra.id")
                    ->select("tipo_obra.tipo", DB::raw("COUNT(obras.tipo_obra_id) as count"))
                    ->groupBy("tipo_obra.tipo")
                    ->get();
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
