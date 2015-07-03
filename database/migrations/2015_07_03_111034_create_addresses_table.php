<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('unit');
            $table->string('street');
            $table->integer('postCode');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('addressable_id');
            $table->string('addressable_type');
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
		Schema::drop('addresses');
	}

}
