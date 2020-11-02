<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;

class CommentsController extends Controller
{
    public function index() {
        $title = "MPP Admin - Comments";
        $comments = Comment::latest()->get();

        return view('admin.posts.comments.index',[
            'title' => $title,
            'comments' => $comments
        ]);
    }

    public function approve($id) {
        Comment::find($id)->update([
            'approved' => 1
        ]);

        toast('Comment Approved', 'success');

        return redirect()->route('comments.index');
    }

    public function disapprove($id) {
        Comment::find($id)->update([
            'approved' => 0
        ]);

        toast('Comment Disapproved', 'warning');

        return redirect()->route('comments.approved');
    }

    public function approvedComments() {
        $title = "MPP Admin - Approved Comments";
        $comments = Comment::where('approved', 1)->latest()->get();

        return view('admin.posts.comments.approved', [
            'title' => $title,
            'comments' => $comments
        ]);
    }

    public function delete($id) {
        Comment::find($id)->delete();

        toast('Comment Deleted!', 'warning');

        return redirect()->route('comments.index');
    }
}
