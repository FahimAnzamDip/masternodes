<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = "MPP - Home";
        $posts = Post::where('post_status', 1)->latest()->take(3)->get();

        return view('home-page', [
            'title' => $title,
            'posts' => $posts
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
