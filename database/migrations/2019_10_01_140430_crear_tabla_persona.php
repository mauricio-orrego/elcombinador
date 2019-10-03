<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres', 100);
            $table->string('apellidos', 100)->nullable();
            $table->string('documento', 20);
            $table->string('dv', 1)->nullable();
            $table->unsignedInteger('tipo_doc_id');
            $table->foreign('tipo_doc_id','fr_tipo_doc_id')->references('id')->on('tipo_doc')->onDelete('restrict')->onUpdate('cascade');
            $table->string('direccion', 100);
            $table->unsignedInteger('ciudad_id');
            $table->foreign('ciudad_id','fr_ciudad_id')->references('id')->on('ciudad')->onDelete('restrict')->onUpdate('cascade');
            $table->string('telefono', 50);
            $table->string('celular', 50);
            $table->unsignedInteger('tipo_per_id');
            $table->foreign('tipo_per_id','fr_tipo_per_id')->references('id')->on('tipo_per')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('persona');
    }
}
