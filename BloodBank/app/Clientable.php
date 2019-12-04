<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientable extends Model
{

    protected $table = 'clientables';
    public $timestamps = true;
    protected $fillable = array('client_id', 'clintable_id', 'clintable_type', 'is_read');

}
