<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_panels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indicator_id')->constrained('indicators');
            $table->string('formula');
            $table->string('objective');
            $table->string('frequency');
            $table->string('goal');
            $table->string('bad_range');
            $table->string('regular_range');
            $table->string('good_range');
            $table->string('iniciatives');
            $table->string('responsable');
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
        Schema::dropIfExists('control_panels');
    }
}
