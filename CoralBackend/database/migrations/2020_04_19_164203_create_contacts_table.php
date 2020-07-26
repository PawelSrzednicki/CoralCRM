<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('owner_id')->nullable();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('zip');
			$table->string('address');
			$table->string('city');
			$table->string('email')->unique();
			$table->string('phone');
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
		Schema::drop('contacts');
	}
}
