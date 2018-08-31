<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('water_need_qty')->nullable();
            $table->string('purpose')->nullable();
            $table->integer('budget')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->string('service_duration')->nullable();
            $table->integer('pipe_size')->nullable();
            $table->integer('pipe_setup_price')->nullable();
            $table->string('technology')->nullable();
            $table->string('sale_name')->nullable();
            $table->string('company')->nullable();
            $table->string('other')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drafts');
    }
}
