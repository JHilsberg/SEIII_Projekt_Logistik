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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->references('id')->on('users');
            $table->integer('abholadresse')->references('id')->on('addresses');

            $table->integer('lieferadresse')->references('id')->on('addresses');

            $table->date('lieferdatum',10);
            $table->date('minlieferzeit',10);
            $table->date('maxlieferzeit',10);

            $table->integer('anzahltransportbehaelter',50);
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

            $table->timestamp('abegesendet');


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
	}

}
