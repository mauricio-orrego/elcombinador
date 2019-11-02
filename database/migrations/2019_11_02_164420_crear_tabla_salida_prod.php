<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSalidaProd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_prod', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('salida_id');
            $table->foreign('salida_id','fr_salida_id')->references('id')->on('salida')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id','fr_producto_id')->references('id')->on('producto')->onDelete('restrict')->onUpdate('cascade');
            $table->float('cantidad', 6, 2);
            $table->integer('valor');
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
        Schema::dropIfExists('table');
    }
}
