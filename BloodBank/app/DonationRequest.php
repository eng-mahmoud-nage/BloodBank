<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name',
        'age', 'bags_num', 'hospital_name',
        'hospital_address', 'blood_type_id',
        'city_id', 'notes', 'latittude', 'longitude',
        'client_id','phone');

    public function blood_type()
    {
        return $this->belongsTo('App\BloodType', 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function notification()
    {
        return $this->hasOne('App\Notification');
    }

    public function clients()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

}
