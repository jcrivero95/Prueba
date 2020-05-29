<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuestos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->unsignedBigInteger('ambitos_impuestos_id');
            $table->unsignedBigInteger('calculos_impuestos_id');
            $table->double('importe');
            $table->string('etiqueta');
            $table->timestamps();

            $table->foreign('ambitos_impuestos_id')->references('id')->on('ambitos_impuestos');
            $table->foreign('calculos_impuestos_id')->references('id')->on('calculos_impuestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impuestos');
    }
}
