<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AuthorizeMail;
use App\Models\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AuthorizeController extends Controller
{
    public function verify($token = null)
    {
        if (Authorize::validateToken($token)) {
            return Redirect::route('user.home')->with([
                'status' => 'You are now authorized !',
            ]);
        }

        return Redirect::route('login')->with([
            'error' => "The authorization token is either expired or invalid. Click on Email didn't arrive ? again",
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        if (Authorize::inactive() && auth()->check()) {
            $authorize = Authorize::make()
                ->resetAttempt();

            Mail::to($request->user())
                ->send(new AuthorizeMail($authorize));

            $authorize->increment('attempt');

            return Redirect::back()->with([
                'status' => 'A new authorization link has been sent to the email address you provided during registration.'
            ]);
        }
    }
}
