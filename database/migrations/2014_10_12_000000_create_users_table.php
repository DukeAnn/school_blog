<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('auth');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('sex')->nullable();
            $table->string('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('qq')->nullable();
            $table->string('university')->nullable();
            $table->string('company')->nullable();
            $table->string('url')->nullable();
            $table->string('position')->nullable();
            $table->string('autograph')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
