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
            //solicitud, solo el paciente y una observacion
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('usuario_solicitud_id');
            $table->longText('observacion_solicitud');
            $table->timestamp('fecha_solicitud');
           

            //creacion de dispensacion
            $table->unsignedBigInteger('usuario_dispensacion_id')->nullable();
            $table->string('cantida_formula')->nullable();
            $table->integer('valor')->nullable();
            $table->string('producto')->nullable();
            $table->longText('observacion_dispensacion')->nullable();
            $table->timestamp('fecha_dispensacion')->nullable();


            //estado a domicilio
            $table->string('estado',1)->default(1); //1 creacion de solicitud  || 2 cuando se confirma la solicitud || 3 cuando se baja el txt pasa a domicilio  || 3 cuando domicilio confirma entrega fin proceso
            $table->timestamp('fecha_domicilio')->nullable();
            $table->unsignedBigInteger('usuario_baja_reporte_id')->nullable();

            //confirmacion de entrega
            $table->unsignedBigInteger('usuario_confirma_domicilio_id')->nullable();
            $table->timestamp('fecha_entrega')->nullable();
            $table->timestamp('fecha_donfirmacion_entrega')->nullable();
            $table->longText('observacion_entrega_domicilio')->nullable();


            //nada
            $table->timestamps();



            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('usuario_solicitud_id')->references('id')->on('users');
            $table->foreign('usuario_dispensacion_id')->references('id')->on('users');
            $table->foreign('usuario_baja_reporte_id')->references('id')->on('users');
            $table->foreign('usuario_confirma_domicilio_id')->references('id')->on('users');

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
