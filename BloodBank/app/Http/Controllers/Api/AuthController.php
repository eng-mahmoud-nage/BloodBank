<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required|exists:clients',
            'password' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            return ResponseJson(0, $validator->errors()->first());
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return ResponseJson(1, 'success',
                    ['api_token' => $client->api_token, 'client' => $client]);
            } else {
                return ResponseJson(0, 'رقمك السرى غير صحيح برجاء اعاده المحاوله');
            }
        }
    }

    public function register(Request $request)
    {

        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:8',
            'e_mail' => 'required|email|unique:clients',
            'phone' => 'required|min:11|unique:clients',
            'date_of_birth' => 'required|date',
            'last_donation_date' => 'required|date',
            'blood_type_id' => 'required',
            'city_id' => 'required',
        ]);
        if ($validator->fails()) {
            return ResponseJson(0, $validator->errors()->first());
        }

        $request->merge(['password' => Hash::make($request->password)]);
        $client = Client::create($request->except('api_token'));
        $client->api_token = Str::random(60);
        $client->save();
        return ResponseJson(1, 'success', [
            'api_token' => $client->api_token,
            'client' => $client
        ]);
    }

    public function profile(Request $request)
    {
        if ($request->has('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }
        $record = auth()->user()->find(auth()->user()->id);
        $update = $record->where('id', $record->id)->update($request->all());
        return ResponseJson(1, 'updated',
            ['record' => $record->fresh(), 'update' => $update]);
    }

    public function reset_password(Request $request){
        if ($request->has('phone'))
            $client = Client::where('phone', $request->phone)->first();
        elseif ($request->has('e_mail'))
            $client = Client::where('e_mail', $request->e_mail)->first();

        $client->update(['pin_code' => rand(1111,9999)]);

        $mail = Mail::to($client->e_mail)
//            ->cc($moreUsers)
//            ->bcc($evenMoreUsers)
            ->send(new ResetPassword($client));
        return ResponseJson(1,'please, check your mail',$client->pin_code);
    }

    public function new_password(Request $request){
        $validator = validator()->make($request->all(), [
            'new_password' => 'required|min:8',
            'confirmed_password' => 'required|same:new_password',
            'pin_code' => 'required|exists:clients'
        ]);
        if ($validator->fails()) {
            return ResponseJson(0, $validator->errors()->first());
        }

        $client = Client::where('pin_code', $request->pin_code)->first();

        if(Hash::check($request->input('new_password'), $client->password)) {
            return ResponseJson(0, 'this password took before, please change your password');
        }

        $client->update(['pin_code' => '', 'password' => Hash::make($request->new_password)]);

        return ResponseJson(1,'your password changed successfully');
    }

    public function change_password(Request $request){
        $validator = validator()->make($request->all(), [
            'new_password' => 'required|min:8',
            'confirmed_password' => 'required|same:new_password',
            'old_password' => 'required'
        ]);
        if ($validator->fails()) {
            return ResponseJson(0, $validator->errors()->first());
        }

        if(Hash::check($request->input('old_password'), auth()->user()->password)){
            if(Hash::check($request->input('new_password'), auth()->user()->password)) {
                return ResponseJson(0, 'Your new Password same old Password!');
            }else{
                $request->user()->update(['password' => Hash::make($request->input('new_password'))]);
            }}else{
            return ResponseJson(0, 'Your old password is wrong!');
        }

        return ResponseJson(1,'success', 'Your Password Changed');
    }
}
