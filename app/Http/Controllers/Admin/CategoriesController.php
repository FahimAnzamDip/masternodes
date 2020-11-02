<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "MPP Admin - Categories";
        $categories = Category::latest()->get();

        return view('admin.posts.categories.index', [
            'title'      => $title,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "MPP Admin - Create Category";

        return view('admin.posts.categories.create', [
            'title'      => $title
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
            'category_name' => 'required|max:190'
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        toast('Post Category Created!', 'success');

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "MPP Admin - Categories";
        $category = Category::findOrFail($id);

        return view('admin.posts.categories.edit', [
            'title'      => $title,
            'category' => $category
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
            'category_name' => 'required|max:190'
        ]);

        Category::find($id)->update([
            'category_name' => $request->category_name
        ]);

        toast('Post Category Updated!', 'success');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        Category::find($id)->delete();

        toast('Post Category Deleted!', 'warning');

        return redirect()->route('categories.index');
    }
}
