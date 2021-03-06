<?php

namespace App\Http\Controllers;

use App\Models\ContactPage;
use App\Models\Countdown;
use App\Models\NormalCoin;
use App\Models\PageView;
use App\Models\Post;
use App\Models\SpecialCoin;
use App\Models\Stat;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index() {
        $title = "MPP - Home";
        $posts = Post::where('post_status', 1)->latest()->take(3)->get();
        $special_coins = SpecialCoin::all();
        $normal_coins = NormalCoin::all();
        $timer = Countdown::first();
        $stat = Stat::first();

        PageView::first()->increment('views');

        return view('home-page', [
            'title'         => $title,
            'posts'         => $posts,
            'special_coins' => $special_coins,
            'normal_coins'  => $normal_coins,
            'timer'         => $timer,
            'stat'          => $stat
        ]);
    }

    public function masternodes() {
        $title = "MPP - Masternodes";
        $normal_coins = NormalCoin::all();

        PageView::first()->increment('views');

        return view('masternodes-page', [
            'title'        => $title,
            'normal_coins' => $normal_coins
        ]);
    }

    public function transactions() {
        $title = "MPP - Transactions";

        PageView::first()->increment('views');

        return view('transactions-page', [
            'title' => $title
        ]);
    }

    public function about() {
        $title = "MPP - About";

        PageView::first()->increment('views');

        return view('about-page', [
            'title' => $title
        ]);
    }

    public function contact() {
        $title = "MPP - Contact";
        $contact = ContactPage::first();

        PageView::first()->increment('views');

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

        PageView::first()->increment('views');

        return view('blog-page', [
            'title' => $title,
            'posts' => $posts
        ]);
    }
}
