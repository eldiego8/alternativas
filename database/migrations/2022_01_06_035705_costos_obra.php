<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CostosObra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras_costos', function (Blueprint $table) {
            $table->id();
            $table->string('clave_obra')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('localidad_id');
            $table->string('clave_localidad');
            $table->string('c_tributaria');
            $table->string('paraje');
            $table->string('jefe_obra');
            $table->string('coordinador');
            $table->string('convenio_general');
            $table->string('convenio_obra');
            $table->string('coordenada_n');
            $table->string('coordenada_s');
            $table->text('descripcion');
            $table->text('justificacion');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('localidad_id')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
