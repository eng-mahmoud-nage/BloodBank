<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content', 'category_id', 'user_id');

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function clients()
    {
        return $this->morphToMany('App\Client', 'clientable');
    }

}
