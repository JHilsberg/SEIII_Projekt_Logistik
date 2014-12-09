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

            $table->integer('userid',32)->references('id')->on('users');
            $table->integer('abholadresse', 32)->references('id')->on('addresses');
            $table->integer('lieferadresse', 32)->references('id')->on('addresses');

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
