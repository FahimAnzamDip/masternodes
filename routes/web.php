<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

//Frontend Pages
Route::get('/', 'PagesController@index')->name('home.page');
Route::get('/masternodes', 'PagesController@masternodes')->name('masternodes.page');
Route::get('/transactions', 'PagesController@transactions')->name('transactions.page');
Route::get('/contact', 'PagesController@contact')->name('contact.page');
Route::get('/about', 'PagesController@about')->name('about.page');
Route::get('/blog', 'PagesController@blog')->name('blog.page');

//Auth Middleware
Route::group(['middleware' => 'auth'], function () {
    //Redirect After Login
    Route::get('/redirects', 'RedirectsController@redirectTo')->name('redirects');
    //New Device Authorization
    Route::get('/authorize/{token}', [
        'name' => 'Authorize Login',
        'as' => 'authorize.device',
        'uses' => 'Auth\AuthorizeController@verify',
    ]);
    Route::post('/authorize/resend', [
        'name' => 'Authorize',
        'as' => 'authorize.resend',
        'uses' => 'Auth\AuthorizeController@resend',
    ]);
});

//User Middleware and Namespace
Route::group(['middleware' => ['auth', 'user', 'verified', 'authorize'], 'namespace' => 'User'], function () {
    //User Dashboard
    Route::get('/user/home', 'UserHomeController@index')->name('user.home');
    //Uesr Profile
    Route::get('/user/profile', 'UserHomeController@profile')->name('user.profile');
    Route::post('/user/profile/update', 'UserHomeController@profileUpdate')->name('user.profile.update');
    //2FA
    Route::get('/user/twofactor', 'UserHomeController@twofactor')->name('user.twofactor');
    //Account Setting
    Route::get('/user/account-setting', 'UserHomeController@accountSetting')->name('user.account.setting');
});

//Admin Middleware and Namespace
Route::group(['namespace' => 'Admin'], function () {
    //Contact Messages
    Route::get('messages/delete/{id}', 'MessagesController@delete')->name('messages.delete');
    Route::resource('messages', 'MessagesController')->except('create', 'edit', 'update', 'destroy');

    Route::group(['middleware' => ['auth', 'admin']], function () {
        //Admin Dashboard
        Route::get('/admin/home', 'AdminHomeController@index')->name('admin.home');
    });
});

