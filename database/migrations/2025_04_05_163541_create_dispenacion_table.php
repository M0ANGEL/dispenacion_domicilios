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
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1')->nullable(); 
            $table->string('apellido2')->nullable();
            $table->string('cedula')->unique();
            $table->string('telfono');
            $table->longText('observacion');
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
        Schema::dropIfExists('dispenacion');
    }
};
