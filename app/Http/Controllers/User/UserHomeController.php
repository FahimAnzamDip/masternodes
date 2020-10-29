<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{

    public function index() {
        $title = "MPP User - Home";

        return view('user.user-home', [
            'title' => $title
        ]);
    }

    public function profile() {
        $title = "MPP User - Profile";

        return view('user.profile.my-profile', [
            'title' => $title
        ]);
    }

    public function profileUpdate(Request $request) {
        $request->validate([
            'first_name'       => 'required|max:255',
            'last_name'        => 'required|max:255',
            'address_line_one' => 'required|max:255',
            'address_line_two' => 'nullable|max:255',
            'city'             => 'required|max:255',
            'zip_code'         => 'required|max:255',
            'country'          => 'required|max:255',
            'phone'            => 'required|max:255'
        ]);

        User::find(Auth::user()->id)->update([
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'address_line_one' => $request->address_line_one,
            'address_line_two' => $request->address_line_two,
            'city'             => $request->city,
            'zip_code'         => $request->zip_code,
            'country'          => $request->country,
            'phone'            => $request->phone
        ]);

        toast('Profile Updated!', 'success');

        return redirect()->route('user.profile');
    }

    public function twofactor() {
        $title = "MPP User - 2FA";

        return view('user.profile.two-factor', [
            'title' => $title
        ]);
    }

    public function accountSetting() {
        $title = "MPP User - Account Setting";

        return view('user.profile.account-settings', [
            'title' => $title
        ]);
    }

    public function support() {
        $title = "MPP User - Support";

        return view('user.support.support', [
            'title' => $title
        ]);
    }

    public function chat() {
        $title = "MPP User - Chat";

        return view('user.support.chat', [
            'title' => $title
        ]);
    }
}
