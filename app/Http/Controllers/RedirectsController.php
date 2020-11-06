<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectsController extends Controller
{
    public function redirectTo() {
        if (Auth::user()->banned == 1) {
            //Logout
            Auth::logout();
            //Banned User
            return redirect()->route('login')->with([
                'status' => 'Your account is banned! Please contact support.'
            ]);
        }

        if (Auth::user()->role == 1) {
            //Admin
            return redirect()->route('admin.home');
        } else {
            //User
            return redirect()->route('user.home');
        }
    }
}
