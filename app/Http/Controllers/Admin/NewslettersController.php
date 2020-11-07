<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewslettersController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'admin'])->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "MPP Admin - Newsletters";
        $newsletters = Newsletter::latest()->get();

        return view('admin.newsletters.index', [
            'title' => $title,
            'newsletters' => $newsletters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|max:190|unique:newsletters'
        ], [
            'email.required' => 'Please Enter Your Email To Subscribe!',
            'email.max' => 'Email Can\'t Be That Long!',
            'email.unique' => 'Ops! You are already in our list.'
        ]);

        Newsletter::create([
            'email' => $request->email
        ]);

        toast('Newsletter Subscribed!', 'success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        Newsletter::findOrFail($id)->delete();

        toast('Newsletter Deleted!', 'warning');

        return redirect()->route('newsletters.index');
    }
}
