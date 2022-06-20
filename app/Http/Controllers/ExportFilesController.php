<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use App\Models\CuencaTributaria;
use App\Models\CategoriaObra;
use App\Models\TipoObra;
use App\Models\CostosObra;
use App\Models\ComiteObra;
use App\Models\ObraLog;
use Illuminate\Support\Facades\Storage;
use PDF;
use ZipArchive;
use Zip;
use File;

class ExportFilesController extends Controller
{
    public function exportZipFiles($obra_id){
        
        $clave_obra = Obra::getClaveForObra($obra_id);

        // Make CSV files 
        $status_a = $this->makeCSVObras($obra_id, $clave_obra);
        $status_b = $this->makeCSVComite($obra_id, $clave_obra);
        $status_c = $this->makeCSVCostos($obra_id, $clave_obra);
                
        return Zip::create('OBRA_'.$clave_obra[0]->clave_obra.'.zip', File::files(public_path('tempcsv')));
    }

    private function makeCSVObras($obra_id){
        try {
            $obra = Obra::FullObraById($obra_id);
            $file = fopen('tempcsv/obra_general.csv', 'w');
            $columns = [
                'Clave de Obra', 'Estado', 'Municipio', 
                'Localidad', 'Clave Localidad', 'Cuenca Tributaria',
                'Tipo de Obra', 'Convenio de Obra', 'Categoria',
                'Situacion de Obra', 'Jefe de Obra', 'Coordinador', 
                'Paraje', 'Sistema', 'Programa', 'Estado Autorizacion', 
                'Coordenada N.', 'Coordenada E.', 'Descripcion', 'Justificacion', 
                'Fecha de Inicio', 'Fecha de Termino'
            ];
            fputcsv($file, $columns);

            $row['Clave_Obra'] = $obra[0]->clave_obra;
            $row['Estado'] = $obra[0]->estado;
            $row['Municipio'] = $obra[0]->municipio;
            $row['Localidad'] = $obra[0]->localidad;
            $row['Clave_Localidad'] = $obra[0]->clave_localidad;
            $row['Cuenca_Tributaria'] = $obra[0]->c_tributaria;
            $row['Tipo_Obra'] = $obra[0]->tipo;
            $row['Convenio_Obra'] = $obra[0]->convenio_obra;
            $row['Categoria'] = $obra[0]->categoria;
            $row['Situacion_Obra'] = $obra[0]->situacion;
            $row['Jefe_Obra'] = $obra[0]->jefe_obra;
            $row['Coordinador'] = $obra[0]->coordinador;
            $row['Paraje'] = $obra[0]->paraje;
            $row['Sistema'] = $obra[0]->sistema;
            $row['Programa'] = $obra[0]->programa;
            $row['Estado_Autorizacion'] = $obra[0]->edo_aut;
            $row['Coordenada_N'] = $obra[0]->coordenada_n;
            $row['Coordenada_E'] = $obra[0]->coordenada_e;
            $row['Descripcion'] = $obra[0]->descripcion;
            $row['Justificacion'] = $obra[0]->justificacion;
            $row['Fecha_Inicio'] = $obra[0]->fecha_inicio;
            $row['Fecha_Termino'] = $obra[0]->fecha_termino;

            fputcsv($file, 
                array(
                    $row['Clave_Obra'], $row['Estado'], $row['Municipio'], $row['Localidad'],
                    $row['Clave_Localidad'], $row['Cuenca_Tributaria'], $row['Tipo_Obra'],
                    $row['Convenio_Obra'], $row['Categoria'], $row['Situacion_Obra'],
                    $row['Jefe_Obra'], $row['Coordinador'], $row['Paraje'],
                    $row['Sistema'], $row['Programa'], $row['Estado_Autorizacion'],
                    $row['Coordenada_N'], $row['Coordenada_E'], $row['Descripcion'],
                    $row['Justificacion'], $row['Fecha_Inicio'], $row['Fecha_Termino']
                )
            );
            fclose($file);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    private function makeCSVComite($obra_id, $clave_obra){
        try {
            
            $comite = json_decode(ComiteObra::getcomiteByObra($obra_id));
            
            $file = fopen('tempcsv/comite_obra.csv', 'w');
            $columns = ['Clave_Obra','Nombre', 'Cargo'];
            
            fputcsv($file, $columns);
            foreach($comite as $com) {
                $row['Clave_Obra'] = $clave_obra[0]->clave_obra;
                $row['Nombre'] = $com->nombre;
                $row['Cargo'] = $com->cargo;
                fputcsv($file, array($row['Clave_Obra'], $row['Nombre'], $row['Cargo']));
            }

            fclose($file);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    private function makeCSVCostos($obra_id, $clave_obra){
        try {
            $costos = json_decode(CostosObra::getCostosByObra($obra_id));
            $file = fopen('tempcsv/costos_data.csv', 'w');
            $columns = ['Clave_Obra','Fuente','Concepto','Monto'];
            
            fputcsv($file, $columns);

            foreach($costos as $costo){
                $row['Clave_Obra'] = $clave_obra[0]->clave_obra;
                $row['Concepto'] = $costo->concepto_text;
                $row['Fuente'] = $costo->fuentef_text;
                $row['Monto'] = $costo->monto;
            }

            fputcsv($file, array($row['Clave_Obra'], $row['Fuente'], $row['Concepto'], $row['Monto']));
            fclose($file);

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
