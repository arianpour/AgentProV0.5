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
            $table->date('dateOfAgreement');
            $table->date('commencingDate');
            $table->date('expireDate');
            $table->integer('rentalAmount');
            $table->integer('rentalDeposit');
            $table->integer('utilitiesDeposit');
            $table->integer('otherDeposit');
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
