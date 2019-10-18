<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEntradaProd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_prod', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('entrada_id');
            $table->foreign('entrada_id','fr_entrada_id')->references('id')->on('entrada')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('entrada_prod');
    }
}
