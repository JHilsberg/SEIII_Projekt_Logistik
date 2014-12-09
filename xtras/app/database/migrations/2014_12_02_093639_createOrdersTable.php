<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

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

        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firma', 32);
            $table->string('strasse', 64);
            $table->string('hausnummer', 5);
            $table->string('ort', 64);
            $table->string('postleitzahl', 10);
        });

        Schema::create('orders', function (Blueprint $table) {

            //$table->engine= 'InnoDB';
            $table->increments('id');
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users');
            $table->integer('abholadresse')->unsigned();
            $table->foreign('abholadresse')->references('id')->on('addresses');
            $table->integer('lieferadresse')->unsigned();
            $table->foreign('lieferadresse')->references('id')->on('addresses');

            $table->date('lieferdatum',10);
            $table->date('minlieferzeit',10);
            $table->date('maxlieferzeit',10);

            $table->integer('anzahltransportbehaelter');
            $table->string('transportbehaelter',50);
            $table->string('warenbeschreibung',250);
            $table->boolean('gefahrengut');
            $table->string('warenverpackung',250);
            $table->float('warengewicht',20);
            $table->string('bemerkung',250);
            $table->boolean('lkw');
            $table->boolean('schiff');
            $table->boolean('zug');
            $table->boolean('pkw');
            $table->boolean('flugzeug');
            $table->boolean('egal');
            $table->timestamp('abgesendet');


        });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
        Schema::drop('users');
        Schema::drop('addresses');
	}

}
