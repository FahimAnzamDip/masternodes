<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function profile() {
        $title = "MPP User - My Profile";

        return view('user.profile.my-profile', [
            'title' => $title
        ]);
    }

    public function profileUpdate(Request $request) {
        $request->validate([
            'first_name'       => 'required|max:190',
            'last_name'        => 'required|max:190',
            'address_line_one' => 'required|max:190',
            'address_line_two' => 'nullable|max:190',
            'city'             => 'required|max:190',
            'zip_code'         => 'required|max:190',
            'country'          => 'required|max:190',
        ]);

        User::find(Auth::user()->id)->update([
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'address_line_one' => $request->address_line_one,
            'address_line_two' => $request->address_line_two,
            'city'             => $request->city,
            'zip_code'         => $request->zip_code,
            'country'          => $request->country,
        ]);

        toast('Profile Updated!', 'success');

        return redirect()->route('user.profile');
    }

    public function accountSetting() {
        $title = "MPP User - Account Setting";

        return view('user.profile.account-settings', [
            'title' => $title
        ]);
    }

    public function accountSettingUpdate(Request $request) {
        $request->validate([
            'email' => 'required|email|max:190|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|max:190'
        ]);

        User::find(Auth::user()->id)->update([
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        toast('Account Settings Updated!', 'success');

        return redirect()->route('user.account.setting');
    }
}
