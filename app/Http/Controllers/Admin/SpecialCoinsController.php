<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpecialCoin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SpecialCoinsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "MPP Admin - Special Coins";
        $coins = SpecialCoin::latest()->get();

        return view('admin.coins.special-coins.index', [
            'title' => $title,
            'coins' => $coins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "MPP Admin - Create Special Coin";

        return view('admin.coins.special-coins.create', [
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
            'coin_name' => 'required',
            'coin_short_name' => 'required',
            'coin_link' => 'required',
            'coin_image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $coin_id = SpecialCoin::insertGetId([
            'coin_name' => $request->coin_name,
            'coin_short_name' => $request->coin_short_name,
            'coin_link' => $request->coin_link,
            'created_at' => Carbon::now()
        ]);

        $uploaded_img = $request->file('coin_image');
        $img_name = 'special_coin_' . $coin_id . '.' . $uploaded_img->getClientOriginalExtension();

        $image = Image::make($uploaded_img)->resize(64, 64)->encode($uploaded_img->getClientOriginalExtension());

        Storage::put('public/special_coin_images/' . $img_name, $image);

        SpecialCoin::find($coin_id)->update([
            'coin_image' => $img_name
        ]);

        toast('Special Coin Created!', 'success');

        return redirect()->route('special-coins.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "MPP Admin - Edit Special Coin";
        $coin = SpecialCoin::find($id);

        return view('admin.coins.special-coins.edit', [
            'title' => $title,
            'coin' => $coin
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
            'coin_name' => 'required',
            'coin_short_name' => 'required',
            'coin_link' => 'required',
            'coin_image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('coin_image')) {
            Storage::delete('public/special_coin_images/'.SpecialCoin::find($id)->coin_image);

            $uploaded_img = $request->file('coin_image');
            $img_name = 'special_coin_' . $id . '.' . $uploaded_img->getClientOriginalExtension();

            $image = Image::make($uploaded_img)->resize(64, 64)->encode($uploaded_img->getClientOriginalExtension());

            Storage::put('public/special_coin_images/' . $img_name, $image);

            SpecialCoin::find($id)->update([
                'coin_image' => $img_name
            ]);
        }

        SpecialCoin::find($id)->update([
            'coin_name' => $request->coin_name,
            'coin_short_name' => $request->coin_short_name,
            'coin_link' => $request->coin_link
        ]);

        toast('Special Coin Updated!', 'success');

        return redirect()->route('special-coins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $coin = SpecialCoin::find($id);

        Storage::delete('public/special_coin_images/'.$coin->coin_image);
        $coin->delete();

        toast('Special Coin Deleted!', 'warning');

        return redirect()->route('special-coins.index');
    }
}
