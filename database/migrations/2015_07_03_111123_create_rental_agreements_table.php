<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalAgreementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rental_agreements', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('owner_id');
            $table->integer('property_id');
            $table->integer('user_id');
            $table->timestamp('dateOfAgreement');
            $table->timestamp('commencingDate');
            $table->timestamp('expireDate');
            $table->string('rentalAmount');
            $table->string('rentalDeposit');
            $table->string('utilitiesDeposit');
            $table->string('otherDeposit');
            $table->string('premiseUse');
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
		Schema::drop('rental_agreements');
	}

}
