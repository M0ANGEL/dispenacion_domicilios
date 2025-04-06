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
        Schema::create('estados_dispesaciones', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('user_id');
             $table->string('estado',1);
             $table->timestamps();

             $table->foreign('user_id')->references('id')->on('user');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados_dispesaciones');
    }
};
