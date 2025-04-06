<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispenacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->string('cantida_formula');
            $table->integer('valor');
            $table->string('producto');
            // $table->unsignedBigInteger('productos_id');
            $table->longText('observacion')->nullable();
            $table->string('estado',1)->default(1); //1 creacion de solicitud  || 2 cuando se baja el txt pasa a domicilio  || 3 cuando domicilio confirma entrega fin proceso
            $table->timestamp('fecha_solicitud');
            $table->timestamp('fecha_domicilio')->nullable();
            $table->timestamp('fecha_entreda')->nullable();
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes');
            // $table->foreign('productos_id')->references('id')->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispenacion');
    }
};
