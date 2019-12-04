<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    function edit_profile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        auth()->user()->update($request->all());
        return redirect(url('/admin/profile'))->with('success', 'Profile Updated.');
    }
}
