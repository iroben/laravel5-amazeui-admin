<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleModelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name', 32);
            $table->string('description', 64);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('created');
            $table->engine = 'MyISAM';

            /*$table->timestamps();*/
        });

        Schema::create('role_action', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('action_id');
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
        Schema::drop('role');
        Schema::drop('role_action');
    }

}
