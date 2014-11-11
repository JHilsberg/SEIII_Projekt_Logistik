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

            $table->string('vorname', 32);
            $table->string('nachname', 32);
            $table->string('firma', 32);

            $table->string('strasse', 64);
            $table->string('hausnummer', 5);
            $table->string('ort', 64);
            $table->string('postleitzahl', 10);
            $table->string('land', 32);


            $table->string('username', 32);
            $table->string('email', 320);
            $table->string('password', 64);

            // required for Laravel 4.1.26
            $table->string('remember_token', 100)->nullable();

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
