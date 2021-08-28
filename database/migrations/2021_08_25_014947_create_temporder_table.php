<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporder', function (Blueprint $table) {
            $table->string('order-id');
            $table->string('roll')->nullable();
            $table->string('color')->nullable();
            $table->string('gauge')->nullable();
            $table->string('desc');
            $table->string('length')->nullable();
            $table->string('quantity');
            $table->integer('ppu');
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
        Schema::dropIfExists('temporder');
    }
}
