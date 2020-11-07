<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{

    public function __construct() {
        $this->middleware([
            'user', 'verified', 'authorize'
        ])->only([
            'userKyc',
            'identitySubmit',
            'locationSubmit',
            'accountSubmit'
        ]);
    }

    public function userKyc() {
        $title = "MPP User - KYC";

        return view('user.kyc.kyc', [
            'title' => $title
        ]);
    }

    public function identitySubmit(Request $request) {
        $request->validate([
            'identity_file_type' => 'required',
            'identity_file'      => 'required|image|mimes:jpeg,jpg,png|size:2048'
        ]);

        $customer = Customer::updateOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            [
                'identity_file_type' => $request->identity_file_type,
                'identity_status'    => 1
            ]
        );

        if ($request->hasFile('identity_file')) {
            $uploaded_img = $request->file('identity_file');
            $img_name = 'identity_file_' . $customer->id . '.' . $uploaded_img->getClientOriginalExtension();

            $image = Image::make($uploaded_img)->encode($uploaded_img->getClientOriginalExtension());

            Storage::put('public/identity_files/' . $img_name, $image);

            Customer::find($customer->id)->update([
                'identity_file' => $img_name
            ]);
        }

        toast('Request Submitted!', 'success');

        return redirect()->route('user.kyc');
    }

    public function locationSubmit(Request $request) {
        $request->validate([
            'location_file_type' => 'required',
            'location_file'      => 'required|image|mimes:jpeg,jpg,png|max:16000'
        ]);

        $customer = Customer::updateOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            [
                'location_file_type' => $request->location_file_type,
                'location_status'    => 1
            ]
        );

        if ($request->hasFile('location_file')) {
            $uploaded_img = $request->file('location_file');
            $img_name = 'location_file_' . $customer->id . '.' . $uploaded_img->getClientOriginalExtension();

            $image = Image::make($uploaded_img)->encode($uploaded_img->getClientOriginalExtension());

            Storage::put('public/location_files/' . $img_name, $image);

            Customer::find($customer->id)->update([
                'location_file' => $img_name
            ]);
        }

        toast('Request Submitted!', 'success');

        return redirect()->route('user.kyc');
    }

    public function accountSubmit(Request $request) {
        $request->validate([
            'verify_code'    => 'required',
            'customer_image' => 'required|image|mimes:jpeg,jpg,png|max:16000'
        ]);

        $customer = Customer::updateOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            [
                'verify_code'    => $request->verify_code,
                'account_status' => 1
            ]
        );

        if ($request->hasFile('customer_image')) {
            $uploaded_img = $request->file('customer_image');
            $img_name = 'customer_image_' . $customer->id . '.' . $uploaded_img->getClientOriginalExtension();

            $image = Image::make($uploaded_img)->encode($uploaded_img->getClientOriginalExtension());

            Storage::put('public/customer_images/' . $img_name, $image);

            Customer::find($customer->id)->update([
                'customer_image' => $img_name
            ]);
        }

        toast('Request Submitted!', 'success');

        return redirect()->route('user.kyc');
    }
}
