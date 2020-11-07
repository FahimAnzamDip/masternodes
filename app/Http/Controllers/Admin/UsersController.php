<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VerifyCodeMail;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "MPP Admin - Users Management";
        $users = User::where('id', '!=', Auth::user()->id)->where('banned', '!=', 1)->where('role', 2)->latest()->get();

        return view('admin.users.index', [
            'title' => $title,
            'users' => $users
        ]);
    }

    public function admins() {
        $title = "MPP - Admins";
        $admins = User::where('role', 1)->latest()->get();

        return view('admin.users.admins', [
            'title'  => $title,
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "MPP - Create Admin";

        return view('admin.users.create-admin', [
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
            'username' => 'required|min:5|max:190|unique:users',
            'email'    => 'required|email|max:190|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'username'   => $request->username,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 1,
            'created_at' => Carbon::now()
        ]);

        toast('Admin Created!', 'success');

        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $title = "MPP Admin - User Details";
        $user = User::findOrFail($id);

        return view('admin.users.show-users', [
            'title' => $title,
            'user'  => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $user = User::findOrFail($id);

        if ($user->customer->identity_file ?? '') {
            Storage::delete('public/identity_files/' . $user->customer->identity_file);
        }
        if ($user->customer->location_file ?? '') {
            Storage::delete('public/location_files/' . $user->customer->location_file);
        }
        if ($user->customer->customer_image ?? '') {
            Storage::delete('public/customer_images/' . $user->customer->customer_image);
        }

        $user->delete();

        toast('User Deleted!', 'warning');

        return redirect()->route('users.index');
    }

    public function bannedUsers() {
        $title = "MPP Admin - Banned Users";
        $users = User::where('id', '!=', Auth::user()->id)->where('banned', 1)->latest()->get();

        return view('admin.users.banned', [
            'title' => $title,
            'users' => $users
        ]);
    }

    public function usersKyc() {
        $title = "MPP Admin - Users KYC";
        $customers = Customer::latest()->get();

        return view('admin.users.users-kyc', [
            'title'     => $title,
            'customers' => $customers
        ]);
    }

    public function usersKycShow($id) {
        $title = "MPP Admin - Users KYC Details";
        $customer = Customer::find($id);

        return view('admin.users.users-kyc-show', [
            'title'    => $title,
            'customer' => $customer
        ]);
    }

    public function ban($id) {
        $user = User::findOrFail($id);

        if ($user->role != 1) {
            $user->update([
                'banned' => 1
            ]);

            toast('User Banned!', 'info');
        }

        return redirect()->route('users.index');
    }

    public function unban($id) {
        $user = User::findOrFail($id);

        if ($user->role != 1) {
            $user->update([
                'banned' => 0
            ]);

            toast('User Unbanned!', 'info');
        }

        return redirect()->route('users.index');
    }

    public function sendCode(Request $request) {
        $request->validate([
            'admin_verify_code' => 'required',
            'customer_id'       => 'required'
        ]);

        $id = $request->customer_id;

        Customer::findOrFail($id)->update([
            'admin_verify_code' => $request->admin_verify_code
        ]);

        $customer = Customer::findOrFail($id);
        $user = User::findOrFail($customer->user_id);

        Mail::to($user)->send(new VerifyCodeMail($customer));

        toast('Email sent with code!', 'success');

        return redirect()->back();
    }

    public function verifyUser(Request $request) {
        $request->validate([
            'identity_status' => 'required',
            'location_status' => 'required',
            'account_status'  => 'required',
            'customer_id'     => 'required'
        ]);

        $id = $request->customer_id;

        if ($request->identity_status == 2) {
            Customer::findOrFail($id)->update([
                'identity_status'      => $request->identity_status,
                'identity_verified_at' => Carbon::now()
            ]);
        } else {
            Customer::findOrFail($id)->update([
                'identity_status' => $request->identity_status
            ]);
        }

        if ($request->location_status == 2) {
            Customer::findOrFail($id)->update([
                'location_status'     => $request->location_status,
                'address_verified_at' => Carbon::now(),
                'phone_verified_at'   => Carbon::now()
            ]);
        } else {
            Customer::findOrFail($id)->update([
                'location_status' => $request->location_status
            ]);
        }

        if ($request->account_status == 2) {
            Customer::findOrFail($id)->update([
                'account_status'      => $request->account_status,
                'account_verified_at' => Carbon::now()
            ]);
        } else {
            Customer::findOrFail($id)->update([
                'account_status' => $request->account_status
            ]);
        }

        toast('Verification Status Updated!', 'success');

        return redirect()->route('admin.users.kyc');
    }

    public function approvedUsers() {
        $title = "MPP Admin - KYC Approved Users";
        $customers = Customer::where('identity_status', 2)->where('location_status', 2)->where('account_status', 2)->latest()->get();

        return view('admin.users.kyc-approved', [
            'title'     => $title,
            'customers' => $customers
        ]);
    }

    public function rejectedUsers() {
        $title = "MPP Admin - KYC Rejected Users";
        $customers = Customer::where('identity_status', 3)->where('location_status', 3)->where('account_status', 3)->latest()->get();

        return view('admin.users.kyc-rejected', [
            'title'     => $title,
            'customers' => $customers
        ]);
    }

    public function usersKycDelete($id) {
        $customer = Customer::find($id);

        if ($customer->identity_file ?? '') {
            Storage::delete('public/identity_files/' . $customer->identity_file);
        }
        if ($customer->location_file ?? '') {
            Storage::delete('public/location_files/' . $customer->location_file);
        }
        if ($customer->customer_image ?? '') {
            Storage::delete('public/customer_images/' . $customer->customer_image);
        }

        $customer->delete();

        toast('User KYC Deleted!', 'warning');

        return redirect()->route('admin.users.kyc');
    }
}
