<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Token;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function set_token(Request $request){
        $validator = validator()->make($request->all(),[
            'token' => 'required',
            'type' => 'required|in:android,IOS'
        ]);
        if ($validator->fails()){
            return ResponseJson(0, $validator->errors()->first());
        }

        Token::where('token', $request->input('token'))->delete();
        $request->user()->tokens()->create($request->all());
        return ResponseJson(1, 'تم التسجيل بنجاح');
    }

    public function new_request(Request $request){
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'age' => 'required',
            'bags_num' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'city_id' => 'required',
            'blood_type_id' => 'required',
            'phone' => 'required'

        ]);
        if ($validator->fails()){
            return ResponseJson(0, $validator->errors()->first());
        }

        $donation = $request->user()->donation_requests()->create($request->all());

        $clients = $donation->city->governorate->clients()->whereHas('blood_types', function ($q) use ($donation, $request) {
            $q->where('blood_types.id', $donation->blood_type_id);
        })->pluck('clients.id')->toArray();
        if ($clients) {
            $notification = $donation->notification()->create([
                'title' => 'you have notification',
                'content' => 'we need donator to this blood type ' . $donation->blood_type->name
            ]);

            $notification->clients()->attach($clients);

            $tokens = Token::whereIn('client_id', $clients)->where('token', '!=', null)->pluck('token')->toArray();
//            dd($tokens);
            $title = $notification->title;
            $body = $notification->body;
            $data= [
                'donation_request_id' => $donation->id
            ];

            $send = notifyByFirebase($title,$body,$tokens,$data);

            return ResponseJson(1, 'success', $send);
        }

    }

    public function donation(Request $request){
        $data = $request->user()->donation_requests()->where('id', $request->id)->get()->toArray();
        return ResponseJson(1, 'success', $data);
    }

    public function donations(Request $request){
        $data = [];
        if ($request->has('blood_type_id', 'city_id')){
            $data = $request->user()->donation_requests()
                ->where('blood_type_id', $request->blood_type_id)
                ->where('city_id', $request->city_id)->paginate(4)->toArray();
        }elseif ($request->has('blood_type_id')){
            $data = $request->user()->donation_requests()->where('blood_type_id', $request->blood_type_id)->paginate(4)->toArray();
        }elseif ($request->has('city_id')){
            $data = $request->user()->donation_requests()->where('city_id', $request->city_id)->paginate(4)->toArray();
        }else{
            $data = $request->user()->donation_requests()->paginate(4)->toArray();
        }
        return ResponseJson(1, 'success', $data);
    }
}
