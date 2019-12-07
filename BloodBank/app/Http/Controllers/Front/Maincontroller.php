<?php

namespace App\Http\Controllers\Front;

use App\Contact;
use App\DonationRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Client;
use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Maincontroller extends Controller
{
    public function home()
    {
        return view('Front.pages.index');
    }

    public function about_us()
    {
        return view('Front.pages.About-us');
    }

    public function article($id)
    {
        $record = Post::find($id);
        return view('Front.pages.article', compact('record'));
    }

    public function contact_us(Request $request)
    {
        if ($request->hasAny(['name', 'e_mail', 'phone', 'subject', 'message'])) {
            Contact::create($request->all());
            return redirect(url('/home'))->with('success', 'Thanks for your contact');
        }
        return view('Front.pages.contact-us');

    }

    public function donator($id)
    {
        $record = DonationRequest::find($id)->load('city', 'blood_type');
        return view('Front.pages.donator', compact('record'));
    }

    public function donation_requests()
    {
        return view('Front.pages.requests');
    }

    public function client_login(Request $request)
    {
        if ($request->hasAny(['e_mail', 'password'])) {
            $request->validate([
                'e_mail' => 'exists:clients',
            ]);
            $credentials = $request->only('e_mail', 'password');
            if (Auth::guard('client-web')->attempt($credentials)) {
                return redirect(url('/home'));
            }
        }
        return view('Front.pages.login');
    }

    public function client_logout()
    {
        Auth::guard('client-web')->logout();
        return redirect(url('/home'));
    }

    public function client_signup(Request $request)
    {
        if ($request->hasAny(['name', 'e_mail', 'phone'])) {
            $request->validate([
                'name' => 'min:15',
                'password' => 'min:8',
                'e_mail' => 'email|unique:clients',
                'phone' => 'min:11|unique:clients',
                'date_of_birth' => 'date',
                'last_donation_date' => 'date',
            ]);
            $request->merge(['password' => Hash::make($request->password)]);
            $client = Client::create($request->except('api_token', 'governorate_id'));
            $client->api_token = Str::random(60);
            $client->save();

            $client->governrates()->attach($request->input('governorate_id'));
            return redirect(url('/client-login'));
        }
        return view('Front.pages.signup');
    }

    public function profile(Request $request)
    {
        if ($request->hasAny(['name', 'e_mail', 'phone', 'password'])) {

            $request->validate([
                'password' => 'min:8'
            ]);

            if ($request->has('password')) {
                $request->merge(['password' => Hash::make($request->password)]);
            }

            $record = Client::find($request->user()->id);
            $update = $record->update($request->all());

            return redirect(url('/profile'));
        }
        return view('Front.pages.profile');
    }

    public function new_request(Request $request)
    {

        if ($request->hasAny(['name', 'phone'])) {
            $donation = $request->user()->donation_requests()->create($request->except('governorate_id'));

            $notification = $donation->notification()->create([
                'title' => 'you have notification',
                'content' => 'we need donator to this blood type' . $donation->blood_type->where('id', $donation->blood_type_id)->pluck('name')
            ]);

            $clients = $donation->city->governorate->clients()->whereHas('blood_types', function ($q) use ($donation, $request) {
                $q->where('blood_types.id', $donation->blood_type_id);
            })->pluck('clients.id')->toArray();
            if ($clients) {
                $notification->clients()->attach($clients);
            }
            return redirect(url('/home'));
        }
        return view('Front.pages.new_request');
    }

    public function notification_setting(Request $request)
    {
        if ($request->hasAny(['blood_types_id', 'governorates_id'])) {
            $request->user()->blood_types()->sync($request->input('blood_types_id'));
            $request->user()->governrates()->sync($request->input('governorates_id'));
            return redirect(url('/home'));
        }
        $blood_types = auth()->guard('client-web')->user()->blood_types;
        $client_governorate = auth()->guard('client-web')->user()->governrates;
        return view('Front.pages.notification_setting', compact('blood_types', 'client_governorate'));

    }

}
