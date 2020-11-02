<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'admin'])->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "MPP Admin - Posts";
        $posts = Post::latest()->get();

        return view('admin.posts.index', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "MPP Admin - Create Post";

        return view('admin.posts.create', [
            'title' => $title
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
            'post_title'     => 'required|max:190',
            'category_id'    => 'required',
            'post_content'   => 'required',
            'post_status'    => 'required',
            'post_tags'      => 'required',
            'post_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
            'slug'           => 'required|alpha_dash|unique:posts'
        ]);

        $post_id = Post::insertGetId([
            'post_title'   => $request->post_title,
            'category_id'  => $request->category_id,
            'post_content' => $request->post_content,
            'user_id'      => Auth::user()->id,
            'post_status'  => $request->post_status,
            'post_tags'    => $request->post_tags,
            'created_at'   => Carbon::now()
        ]);

        $uploaded_img = $request->file('post_thumbnail');
        $img_name = 'post_' . $post_id . '.' . $uploaded_img->getClientOriginalExtension();

        $image = Image::make($uploaded_img)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($uploaded_img->getClientOriginalExtension());

        Storage::put('public/post_images/' . $img_name, $image);

        Post::find($post_id)->update([
            'post_thumbnail' => $img_name
        ]);

        toast('Post Created!', 'success');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        $title = "MPP - " . $post->post_title;
        $categories = Category::latest()->get();
        $recent_posts = Post::where('id', '!=', $post->id)->where('post_status', 1)->latest()->take(3)->get();

        return view('blog-details-page', [
            'title'        => $title,
            'post'         => $post,
            'categories'   => $categories,
            'recent_posts' => $recent_posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "MPP Admin - Edit Post";
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', [
            'title' => $title,
            'post'  => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'post_title'     => 'required|max:190',
            'category_id'    => 'required',
            'post_content'   => 'required',
            'post_status'    => 'required',
            'post_tags'      => 'required',
            'post_thumbnail' => 'nullable|image|mimes:jpeg,jpg,png',
            'slug'           => 'required|alpha_dash'
        ]);

        if ($request->hasFile('post_thumbnail')) {
            $uploaded_img = $request->file('post_thumbnail');

            Storage::delete('public/post_images/'.Post::find($id)->post_thumbnail);

            $img_name = 'post_' . $id . '.' . $uploaded_img->getClientOriginalExtension();

            $image = Image::make($uploaded_img)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($uploaded_img->getClientOriginalExtension());

            Storage::put('public/post_images/' . $img_name, $image);

            Post::find($id)->update([
                'post_thumbnail' => $img_name
            ]);
        }

        Post::find($id)->update([
            'post_title'   => $request->post_title,
            'category_id'  => $request->category_id,
            'post_content' => $request->post_content,
            'post_status'  => $request->post_status,
            'post_tags'    => $request->post_tags
        ]);

        toast('Post Updated!', 'success');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $post = Post::find($id);

        Storage::delete('public/post_images/'.$post->post_thumbnail);
        $post->delete();

        toast('Post Deleted!', 'warning');

        return redirect()->route('posts.index');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->post_title);

        return response()->json(['slug' => $slug]);
    }

    public function draft() {
        $title = "MPP Admin - Draft Post";
        $posts = Post::where('post_status', 2)->latest()->get();

        return view('admin.posts.draft', [
            'title' => $title,
            'posts' => $posts
        ]);
    }
}
