<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'donation_request_id');

    public function donation_request()
    {
        return $this->belongsTo('App\DonationRequest', 'donation_request_id');
    }

    public function clients()
    {
        return $this->morphToMany('App\Client', 'clientable')
            ->withPivot('is_read');
    }

}
