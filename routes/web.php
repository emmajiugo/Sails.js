<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes for the frontend
Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/pricing', 'FrontEndController@pricing')->name('pricing');
Route::get('/contact', 'FrontEndController@contact')->name('contact');
Route::post('/contact', 'FrontEndController@contactPost')->name('contact.post');
Route::get('/live-chat', 'FrontEndController@liveChat')->name('live.chat');
Route::get('/coming-soon', 'FrontEndController@comingSoon')->name('coming.soon');
Route::get('/authenticate/parents', function() { return view('auth.parents-auth'); })->name('auth.parents');
Route::get('/authenticate/schools', function () { return view('auth.schools-auth'); })->name('auth.schools');

// Available because of the logout/reset password function
Auth::routes();

// overiding login and register routes
Route::get('login',  function() { return redirect(route('auth.schools')); })->name('login');
Route::get('register',  function () { return redirect(route('auth.schools')); })->name('register');

// routes for the school dashboard
Route::prefix('school')->group(function() {
    // Auth route for school
    Route::post('/login', 'Auth\SchoolLoginController@login')->name('school.login.submit');
    Route::post('/register', 'Auth\SchoolRegisterController@register')->name('school.register.submit');

    // Password reset routes
    Route::post('/password/email', 'Auth\SchoolForgotPasswordController@sendResetLinkEmail')->name('school.password.email');
    Route::get('/password/reset', 'Auth\SchoolForgotPasswordController@showLinkRequestForm')->name('school.password.request');
    Route::post('/password/reset', 'Auth\SchoolResetPasswordController@reset')->name('school.password.update');;
    Route::get('/password/reset/{token}', 'Auth\SchoolResetPasswordController@showResetForm')->name('school.password.reset');

    // Withdraw funds
    Route::post('withdraw', 'WalletController@withdraw')->name('wallet.withdraw');
    Route::get('withdraw-history', 'WalletController@history')->name('withdraw.history');

    // create a new account
    Route::post('/create', 'SchoolDetailsController@create')->name('school.account.create');
    Route::post('/switch-account', 'SchoolDetailsController@switch')->name('school.account.switch');

    // fee structure
    Route::resource('/setup-fees', 'SetupFeesController')->names([
        'index' => 'school.setup.fees',
        'store' => 'school.fees.store'
    ]);

    // fees collected
    Route::get('/fees-collected', 'FeesCollectedController@index')->name('school.fees.collected');
    Route::put('/fees-collected/{id}', 'FeesCollectedController@update')->name('school.fees.collected.update');

    // view setup fees
    Route::get('/view-setup/{section}', 'ViewSetupsController@index');
    Route::post('/view-setup', 'ViewSetupsController@search')->name('setup.search');
    Route::post('/view-setup/addbreakdown', 'ViewSetupsController@addbreakdown')->name('setup.addbreakdown');
    Route::put('/view-setup/{id}', 'ViewSetupsController@update')->name('setup.update');
    Route::delete('/view-setup/{id}', 'ViewSetupsController@destroy')->name('setup.delete');

    // advance view
    Route::resource('/advance-view', 'AdvanceViewController')->names([
        'index' => 'school.advance.view'
    ]);

    // transaction history & report
    Route::get('/history', 'TransactionController@index')->name('school.transaction.history');
    Route::view('/report', 'school.report')->middleware('auth:school');

    // settings
    Route::resource('/settings', 'SettingsController')->names([
        'index' => 'school.settings'
    ]);

    // router for school dashboard
    Route::get('/', 'SchoolController@index')->name('school.dashboard');
});


// get account name from bank details, used for ajax call
Route::post('/gateway/resolve-account', 'BankDetailsController@resolveAccountName');

// webhook
Route::prefix('webhooks')->group(function () {
    Route::post('flutterwave/handle', 'Webhook\FlutterwaveWebhookProcessor@handle');
});
