<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEntrada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('entrada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('proveedor_id');
            $table->foreign('proveedor_id','fk_proveedor_id')->references('id')->on('proveedor')->onDelete('restrict')->onUpdate('cascade');
            $table->string('factura', 30);
            $table->unique(['proveedor_id','factura'], 'factura_unica');
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
        Schema::dropIfExists('entrada');
    }
}
