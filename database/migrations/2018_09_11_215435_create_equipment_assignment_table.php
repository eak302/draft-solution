<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment-assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('technology_id')->length(10);
            $table->integer('equipment_id')->length(10);
            $table->string('layer')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_assignment');
    }
}
