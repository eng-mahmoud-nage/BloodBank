<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->string('e_mail');
			$table->string('phone');
            $table->string('fax');
            $table->text('about_us');
			$table->text('notification_setting_text');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
