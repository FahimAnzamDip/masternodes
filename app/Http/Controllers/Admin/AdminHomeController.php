<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index() {
        $title = "MPP Admin - Home";

        return view('admin.admin-home', [
            'title' => $title
        ]);
    }
}
