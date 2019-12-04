<?php

namespace App\Http\Controllers\Api;

use App\BloodType;
use App\City;
use App\Contact;
use App\Governorate;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function cities(Request $request){
        $record = City::where('governorate_id', $request->governorate_id)->get();
        return ResponseJson(1, 'cities', ['record' => $record]);
    }

    public function governorates(){
        $record = Governorate::all();
        return ResponseJson(1, 'governorates', ['record' => $record]);
    }

    public function blood_types(){
        $record = BloodType::all();
        return ResponseJson(1, 'blood types', ['record' => $record]);
    }

    public function setting(){
        $record = Setting::all();
        return ResponseJson(1, 'setting', ['record' => $record]);
    }

    public function contacts(Request $request){
        $validator = validator()->make($request->all(), [
            'phone' => 'required',
            'name' => 'required',
            'e_mail' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()){
            return ResponseJson(0, $validator->errors()->first());
        }
        $record = Contact::create($request->all());
        return ResponseJson(1, 'contacts', ['record' => $record]);
    }

}
