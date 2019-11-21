<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('e-mail');
			$table->string('phone');
			$table->string('subject');
			$table->text('messege');
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}