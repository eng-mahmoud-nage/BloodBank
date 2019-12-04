<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'date_of_birth', 'password', 'e_mail', 'last_donation_date', 'pin_code', 'blood_type_id', 'city_id');

    public function blood_type()
    {
        return $this->belongsTo('App\BloodType', 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function governrates()
    {
        return $this->morphedByMany('App\Governorate', 'clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany('App\Notification', 'clientable');
    }

    public function blood_types()
    {
        return $this->morphedByMany('App\BloodType', 'clientable');
    }

    public function posts()
    {
        return $this->morphedByMany('App\Post', 'clientable');
    }

    public function donation_requests()
    {
        return $this->hasMany('App\DonationRequest');
    }

    protected $hidden = [
        'password', 'api_token',
    ];
}
