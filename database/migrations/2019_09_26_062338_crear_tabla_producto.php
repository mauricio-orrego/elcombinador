<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->integer('costo');
            $table->integer('valorventa');
            $table->unsignedInteger('bodega_id');
            $table->foreign('bodega_id','fr_bodega_id')->references('id')->on('bodega')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id','fk_categoria_id')->references('id')->on('categoria')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('producto');
    }
}
