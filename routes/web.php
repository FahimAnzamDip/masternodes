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

    //Live Chats
    Route::get('/chats', 'ChatsController@index')->name('chats');
    Route::get('/users', 'ChatsController@users');
    Route::get('/user/messages/{id}', 'ChatsController@userMessages');
    Route::post('/message/send', 'ChatsController@messageSend');
    Route::post('/message/image/send', 'ChatsController@messageImageSend');
    Route::get('/chats/delete/{id}', 'ChatsController@messagesDelete');

    //KYC Know Your Customer
    Route::get('/user/kyc', 'CustomersController@userKyc')->name('user.kyc');
    Route::post('/user/kyc/identity/submit', 'CustomersController@identitySubmit')->name('user.kyc.identity.submit');
    Route::post('/user/kyc/location/submit', 'CustomersController@locationSubmit')->name('user.kyc.location.submit');
    Route::post('/user/kyc/account/submit', 'CustomersController@accountSubmit')->name('user.kyc.account.submit');
});

//User Middleware and Namespace
Route::group(['middleware' => ['auth', 'user', 'verified', 'authorize'], 'namespace' => 'User'], function () {
    //User Calculator
    Route::get('/user/home', 'UserHomeController@index')->name('user.home');
    //User Calculator
    Route::get('/user/calculator', 'UserHomeController@calculator')->name('user.calculator');
    //Support
    Route::get('/user/support', 'UserHomeController@support')->name('user.support');
    //Event Calendar
    Route::get('/user/event/calendar', 'UserHomeController@eventCalendar')->name('user.event.calendar');
    //2FA
    Route::get('/user/twofactor', 'UserHomeController@twofactor')->name('user.twofactor');

    //User Profile
    Route::get('/user/profile', 'ProfileController@profile')->name('user.profile');
    Route::post('/user/profile/update', 'ProfileController@profileUpdate')->name('user.profile.update');
    //User Account Setting
    Route::get('/user/account-setting', 'ProfileController@accountSetting')->name('user.account.setting');
    Route::post('/user/account-setting/update', 'ProfileController@accountSettingUpdate')->name('user.account.setting.update');
});

//Admin Middleware and Namespace
Route::group(['namespace' => 'Admin'], function () {
    //Contact Messages
    Route::get('messages/delete/{id}', 'MessagesController@delete')->name('messages.delete');
    Route::resource('messages', 'MessagesController')->except('create', 'edit', 'update', 'destroy');

    //Posts
    Route::get('/posts/draft', 'PostsController@draft')->name('posts.draft');
    Route::get('/posts/checkSlug', 'PostsController@checkSlug')->name('posts.check.slug');
    Route::get('/posts/delete/{id}', 'PostsController@delete')->name('posts.delete');
    Route::resource('posts', 'PostsController')->except('destroy');

    Route::group(['middleware' => ['auth', 'admin']], function () {
        //Admin Dashboard
        Route::get('/admin/home', 'AdminHomeController@index')->name('admin.home');

        //Users Management
        Route::get('/users/delete/{id}', 'UsersController@delete')->name('users.delete');
        Route::get('/users/ban/{id}', 'UsersController@ban')->name('users.ban');
        Route::get('/users/unban/{id}', 'UsersController@unban')->name('users.unban');
        Route::get('/users/banned', 'UsersController@bannedUsers')->name('users.banned');
        Route::get('/admin/users/kyc', 'UsersController@usersKyc')->name('admin.users.kyc');
        Route::get('/admin/users/kyc/show/{id}', 'UsersController@usersKycShow')->name('admin.users.kyc.show');
        Route::get('/admin/users/kyc/delete/{id}', 'UsersController@usersKycDelete')->name('admin.users.kyc.delete');
        Route::get('/admin/users/kyc/approved', 'UsersController@approvedUsers')->name('admin.users.kyc.approved');
        Route::get('/admin/users/kyc/rejected', 'UsersController@rejectedUsers')->name('admin.users.kyc.rejected');
        Route::post('/admin/users/kyc/verify', 'UsersController@verifyUser')->name('admin.users.kyc.verify');
        Route::post('/admin/users/kyc/send-code', 'UsersController@sendCode')->name('admin.users.kyc.send-code');
        Route::resource('users', 'UsersController')->except('edit', 'update', 'destroy');

        //Post Categories
        Route::get('/categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete');
        Route::resource('categories', 'CategoriesController')->except('show', 'destroy');

        //Post Comments
        Route::get('/comments', 'CommentsController@index')->name('comments.index');
        Route::get('/comments/approve/{id}', 'CommentsController@approve')->name('comments.approve');
        Route::get('/comments/disapprove/{id}', 'CommentsController@disapprove')->name('comments.disapprove');
        Route::get('/comments/approved', 'CommentsController@approvedComments')->name('comments.approved');
        Route::get('/comments/delete/{id}', 'CommentsController@delete')->name('comments.delete');

        //Special Coins
        Route::get('/special-coins/delete/{id}', 'SpecialCoinsController@delete')->name('special-coins.delete');
        Route::resource('special-coins', 'SpecialCoinsController')->except('show', 'destroy');

        //Normal Coins
        Route::get('/normal-coins/delete/{id}', 'NormalCoinsController@delete')->name('normal-coins.delete');
        Route::resource('normal-coins', 'NormalCoinsController')->except('show', 'destroy');

        //Events
        Route::get('/admin/calendar', 'EventsController@showCalendar')->name('admin.calendar');
        Route::get('/events/delete/{id}')->name('events.delete');
        Route::resource('events', 'EventsController')->except('show', 'destroy');

        //Countdown
        Route::get('/admin/countdown', 'CountdownController@countdown')->name('admin.countdown');
        Route::post('/countdown/update/{id}', 'CountdownController@update')->name('countdown.update');

        //Admin Profile
        Route::get('/admin/profile', 'ProfileController@profile')->name('admin.profile');
        Route::post('/admin/profile/update', 'ProfileController@profileUpdate')->name('admin.profile.update');
        //Admin Account Setting
        Route::get('/admin/account-setting', 'ProfileController@accountSetting')->name('admin.account.setting');
        Route::post('/admin/account-setting/update', 'ProfileController@accountSettingUpdate')->name('admin.account.setting.update');

        //Contact Page
        Route::get('/admin/contact-page', 'ContactPageController@index')->name('admin.contact-page');
        Route::post('/admin/contact-page/update/{id}', 'ContactPageController@update')->name('admin.contact-page.update');
    });
});

