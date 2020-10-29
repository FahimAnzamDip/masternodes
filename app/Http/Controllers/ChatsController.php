<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index() {
        $title = "MPP User - Live Chat";

        return view('', [
            'title' => $title
        ]);
    }
}
