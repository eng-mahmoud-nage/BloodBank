<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientable extends Model 
{

    protected $table = 'clientable';
    public $timestamps = true;
    protected $fillable = array('client_id', 'clintable_id', 'clintable_type', 'is_read');

}