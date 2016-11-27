<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id')->unsigned();
            $table->string('username')->default("");
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('vip')->unsigned()->default(0);
            $table->integer('money')->unsigned()->default(0);
            $table->integer('regtime')->unsigned()->default(0);
            $table->integer('lastlogin')->unsigned()->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('acc_num')->unsigned()->default(0);
            $table->string('testmail')->default("");
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
