<?php

namespace App\Http\Controllers;

use App\Events\MessageSendEvent;
use App\Models\Chat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function index() {
        $title = "MPP - Chat";

        return view('user.support.chat', [
            'title' => $title
        ]);
    }

    public function users() {
        if (!\request()->ajax()) {
            abort(404);
        }

        if (Auth::user()->role == 1) {
            $users = User::where('role', 2)->latest()->get();
        } else {
            $users = User::where('role', 1)->latest()->get();
        }

        return response()->json($users, 200);
    }

    public function userMessages($id) {
        if (!\request()->ajax()) {
            abort(404);
        }

        $user = User::findOrFail($id);

        $messages = $this->messagesById($id);

        return response()->json([
            'messages' => $messages,
            'user' => $user
        ], 200);
    }

    public function messageSend(Request $request) {
        if (!\request()->ajax()) {
            abort(404);
        }

        $request->validate([
            'message' => 'required',
            'receiver_id' => 'required'
        ]);

        $message = Chat::create([
            'user_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'type' => 0
        ]);

        $message = Chat::create([
            'user_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'type' => 1
        ]);

        broadcast(new MessageSendEvent($message));

        return response()->json($message, 201);
    }

    public function messagesDelete($id) {
        if (!\request()->ajax()) {
            abort(404);
        }

        $messages = $this->messagesById($id);

        foreach ($messages as $message) {
            Chat::findOrFail($message->id)->delete();
        }

        return response()->json('Deleted', 200);
    }

    protected function messagesById($id) {
        $messages = Chat::where(function ($query) use ($id) {
            $query->where('user_id', Auth::user()->id);
            $query->where('receiver_id', $id);
            $query->where('type', 0);
        })->orWhere(function ($query) use ($id) {
            $query->where('user_id', $id);
            $query->where('receiver_id', Auth::user()->id);
            $query->where('type', 1);
        })->with('user')->get();

        return $messages;
    }
}
