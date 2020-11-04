<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index() {
        $title = "MPP Admin - Contact Page";
        $contact = ContactPage::first();

        return view('admin.messages.contact', [
            'title' => $title,
            'contact' => $contact
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'top_title' => 'required|max:190',
            'main_title' => 'required|max:190',
            'page_content' => 'required'
        ]);

        ContactPage::find($id)->update([
            'top_title' => $request->top_title,
            'main_title' => $request->main_title,
            'content' => $request->page_content
        ]);

        toast('Contact Page Updated!', 'success');

        return redirect()->route('admin.contact-page');
    }
}
