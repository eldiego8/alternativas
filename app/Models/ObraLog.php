<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraLog extends Model
{
    use HasFactory;
    protected $table = "obra_logs";

    public static function createLog($info){
        try {
            $log = new ObraLog;
            $log->obra_id = $info->obra_id;
            $log->fecha_obs = $info->date;
            $log->descripcion = $info->desc;
            $log->save();

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getLogs($obra_id){
        try {
            return ObraLog::where('obra_id', $obra_id)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function dropLog($log_id){
        try {
            return ObraLog::find($log_id)->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
