<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientableTable extends Migration {

	public function up()
	{
		Schema::create('clientable', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id')->unsigned()->nullable();
			$table->integer('clintable_id');
			$table->string('clintable_type');
			$table->boolean('is_read');
		});
	}

	public function down()
	{
		Schema::drop('clientable');
	}
}