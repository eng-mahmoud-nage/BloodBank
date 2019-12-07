<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('play_store_url', 'app_store_url',
        'fb_link', 'twt_link', 'insta_link', 'youtube_link',
        'about_app', 'e_mail', 'about_us','notification_setting_text', 'phone');

}
