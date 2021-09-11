<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicatorStrategicMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator_strategic_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indicator_id')->constrained('indicators');
            $table->foreignId('strategic_map_id')->constrained('strategic_maps');
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
        Schema::dropIfExists('indicator_strategic_map');
    }
}
