<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileInvestorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:investor']);
    }

    public function editProfile(){
        return view('investor.edit-profile');
    }

    public  function editProfileForm(){
        return view('investor.edit-profile-form');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email'
        ]);

        $profile = User::find(\Auth::user()->id);
        $profile->name = $request->full_name;
        $profile->phone = $request->phone_number;
        $profile->email = $request->email;
        $profile->save();

        return redirect('edit-profile-investor');
    }

    public function passwordProfile(Request $request)
    {
        $request->validate([
            'new_password' => 'Required_with:confirm_password|same:confirm_password|min:8',
            'confirm_password' => 'min:8',
            'old_password' => 'Required'
        ]);

        if (\Hash::check($request->old_password, \Auth::user()->password)) {
            $profile = User::find(\Auth::user()->id);
            $profile->password = bcrypt($request->new_password);
            $profile->save();
        }

        return redirect('edit-profile-investor');
    }
}
