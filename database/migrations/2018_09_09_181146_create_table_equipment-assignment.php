<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEquipmentAssignment extends Migration
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
            $table->string('technology_name')->nullable();
            $table->string('equipment_name')->nullable();
            $table->string('equipment_picture')->nullable();
            $table->string('equipment_detail')->nullable();
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
        //
    }
}
