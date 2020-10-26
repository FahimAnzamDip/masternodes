<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = "MPP - Home";

        return view('home-page', [
            'title' => $title
        ]);
    }

    public function masternodes() {

    }

    public function transactions() {
        $title = "MPP - Transactions";

        return view('transactions-page', [
            'title' => $title
        ]);
    }

    public function about() {
        $title = "MPP - About";

        return view('about-page', [
            'title' => $title
        ]);
    }

    public function contact() {
        $title = "MPP - Contact";

        return view('contact-page', [
            'title' => $title
        ]);
    }

    public function blog() {
        $title = "MPP - Blog";

        return view('blog-page', [
            'title' => $title
        ]);
    }
}
