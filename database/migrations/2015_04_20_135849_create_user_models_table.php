<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserModelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name', 32);
            $table->string('real_name', 32);
            $table->string('email', 32);
            $table->string('password', 128);
            $table->string('remember_token', 128);
            $table->tinyInteger('is_admin');
            $table->unsignedInteger('created');
            $table->unsignedInteger('last_login');
            $table->unsignedInteger('role_id');
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
        Schema::drop('user');
    }

}
