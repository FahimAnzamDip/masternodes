<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Notifications\ContactMessageNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class MessagesController extends Controller
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
        $title = "MPP Admin - Messages";
        $messages = Message::latest()->get();

        return view('admin.messages.index', [
            'title' => $title,
            'messages' => $messages
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
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required|email|max:255',
            'subject'    => 'required|max:255',
            'message'    => 'required',
            'attachment' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('attachment')) {
            $uploaded_img = $request->file('attachment');

            $message = Message::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'subject'    => $request->subject,
                'message'    => $request->message,
                'created_at' => Carbon::now()
            ]);

            $img_name = 'message_' . $message->id . '.' . $uploaded_img->getClientOriginalExtension();
            $image = Image::make($uploaded_img)->encode($uploaded_img->getClientOriginalExtension());
            Storage::put('public/message_attachments/' . $img_name, $image);

            Message::find($message->id)->update([
                'attachment' => $img_name
            ]);
        } else {
            $message = Message::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'subject'    => $request->subject,
                'message'    => $request->message,
                'created_at' => Carbon::now()
            ]);
        }

        $users = User::where('role', 1)->get();

        Notification::send($users, new ContactMessageNotification($message));

        toast('Message Sent!', 'success');

        return redirect()->route('contact.page');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $title = "MPP Admin - Message Details";
        $message = Message::find($id);

        $message->update([
            'read' => 1
        ]);

        return view('admin.messages.show', [
            'title' => $title,
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $message = Message::find($id);

        if ($message->attachment) {
            Storage::delete('public/message_attachments/' . $message->attachment);
        }
        $message->delete();

        toast('Message Deleted!', 'warning');

        return redirect()->route('messages.index');
    }
}
