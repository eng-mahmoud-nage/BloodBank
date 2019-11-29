<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function changepass(Request $request){

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        if(Hash::check($request->input('old_password'), auth()->user()->password)){
            if(Hash::check($request->input('new_password'), auth()->user()->password)) {
                return redirect(url('/profile'))
                    ->with('danger', 'Your new Password same old Password!');
            }else{
                auth()->user()->update(['password' => Hash::make($request->input('new_password'))]);
            }

        }
        return redirect(url('/profile'))->with('success', 'Your Password Changed');
    }
}
