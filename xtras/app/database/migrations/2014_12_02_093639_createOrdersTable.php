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
            $table->increments('orderid');

            $table->integer('userid')->references('id')->on('users');
            $table->string('abholadresse', 32)->references('adresses')->on('adressid');
            $table->string('lieferadresse', 32)->references('adresses')->on('adressid');

            $table->date('lieferdatum',10);
            $table->date('minlieferzeit',10);
            $table->date('maxlieferzeit',10);
            $table->string('transportmittel',50);
            $table->string('container',50);
            $table->string('warenbeschreibung',250);
            $table->boolean('gefahrengut');
            $table->string('warenverpackung',250);
            $table->float('warengewicht',20);
            $table->string('bemerkung',250);

            $table->primary('orderid');



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
