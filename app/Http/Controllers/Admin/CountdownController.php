<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countdown;
use Illuminate\Http\Request;

class CountdownController extends Controller
{
    public function countdown() {
        $title = "MPP Admin - Countdown";
        $countdown = Countdown::first();

        return view('admin.countdown.create', [
            'title' => $title,
            'countdown' => $countdown
        ]);
    }

    public function update(Request $request, $id) {
        Countdown::find($id)->update([
           'countdown' => $request->countdown
        ]);

        toast('Timer Updated!', 'info');

        return redirect()->route('admin.countdown');
    }
}
