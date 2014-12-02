<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateadressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('adressid');
            $table->string('firma', 32);
            $table->string('strasse', 64);
            $table->string('hausnummer', 5);
            $table->string('ort', 64);
            $table->string('postleitzahl', 10);

            $table->primary('adressid');


	});
    }



	public function down()
    {
        Schema::drop('adresses');
    }

}
