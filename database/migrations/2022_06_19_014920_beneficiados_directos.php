<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BeneficiadosDirectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiados_directos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obra_id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('descripcion');
            $table->foreign('obra_id')->references('id')->on('obras');
            $table->timestamps();
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
