<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
}
