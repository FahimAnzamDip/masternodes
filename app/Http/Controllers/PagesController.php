<?php

namespace App\Http\Controllers;

use App\Models\ContactPage;
use App\Models\Countdown;
use App\Models\NormalCoin;
use App\Models\Post;
use App\Models\SpecialCoin;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index() {
        $title = "MPP - Home";
        $posts = Post::where('post_status', 1)->latest()->take(3)->get();
        $special_coins = SpecialCoin::latest()->take(18)->get();
        $normal_coins = NormalCoin::latest()->take(18)->get();
        $timer = Countdown::first();

        return view('home-page', [
            'title'         => $title,
            'posts'         => $posts,
            'special_coins' => $special_coins,
            'normal_coins'  => $normal_coins,
            'timer'         => $timer
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
        $contact = ContactPage::first();

        return view('contact-page', [
            'title'   => $title,
            'contact' => $contact
        ]);
    }

    public function blog(Request $request) {
        $title = "MPP - Blog";

        if ($request->has('category_id')) {
            $posts = Post::where('category_id', $request->category_id)->where('post_status', 1)->latest()->paginate(6);
        } else {
            $posts = Post::where('post_status', 1)->latest()->paginate(6);
        }

        return view('blog-page', [
            'title' => $title,
            'posts' => $posts
        ]);
    }
}
