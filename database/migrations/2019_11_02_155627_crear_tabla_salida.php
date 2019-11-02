<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSalida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('cliente_id');
                $table->foreign('cliente_id','fk_cliente_id')->references('id')->on('cliente')->onDelete('restrict')->onUpdate('cascade');
                $table->string('factura', 9);
                $table->date('fecha');
                $table->date('fecha_venci');
                $table->string('forma_pago', 7);
                $table->string('estado', 1)->nullable();
                $table->double('valor', 8, 2)->nullable();
                $table->double('iva', 8, 2)->nullable();
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
