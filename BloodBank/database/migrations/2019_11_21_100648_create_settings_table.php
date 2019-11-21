<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('play_store_url');
			$table->string('app_store_url');
			$table->string('fb_link');
			$table->string('twt_link');
			$table->string('insta_link');
			$table->string('youtube_link');
			$table->text('about_app');
			$table->string('e-mail');
			$table->string('notification_setting_text');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}