<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectsController extends Controller
{
    public function redirectTo() {
        $role = Auth::user()->role;

        if ($role == 1) {
            //Admin
            return redirect()->route('admin.home');
        } else {
            //User
            return redirect()->route('user.home');
        }
    }
}
