<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionModelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action_name', 32);
            $table->string('description', 64);
            $table->string('action_namespace', 64);
            $table->string('action_class', 32);
            $table->string('action_method', 32);
            $table->string('prefix_class', 32);
            $table->string('action', 64);
            $table->tinyInteger('pid');
            $table->unsignedInteger('created');
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('action');
    }

}
