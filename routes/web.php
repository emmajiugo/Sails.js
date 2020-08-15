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

// Auth route for user
Auth::routes();

// routes for the user dashboard
Route::prefix('home')->group(function() {

    // route for user profile
    Route::get('/profile', 'UserProfileController@index')->name('user.profile');
    Route::post('/profile', 'UserProfileController@update')->name('user.profile.post');

    // route for user support
    Route::resource('/support', 'UserSupportController')->names([
        'index' => 'user.support',
        'store' => 'user.support.post',
        'show'  => 'user.ticket.show',
    ]);
    Route::post('support-reply/{id}', 'UserSupportController@supportReplyPost')->name('user.reply.post');

    // route for savings plan
    // Route::get('/savings-plan', 'UserSavingsController@index')->name('user.savings'); [coming soon]

    // route to implement search
    Route::get('/list-schools', 'UserSearchController@listVerifiedSchool');
    // Route::post('/ajax-search', 'UserSearchController@ajaxSearch');
    Route::get('/search', 'UserSearchController@getSearch')->name('user.search');
    Route::post('/search', 'UserSearchController@postSearch')->name('user.search.post');
    Route::post('/search/school', 'UserSearchController@postSchool')->name('user.school.post');
    Route::post('/search/school-continue', 'UserSearchController@postForInvoice')->name('user.invoice.post');

    // route to invoice
    Route::get('/invoices', 'InvoiceController@index')->name('user.invoice');
    Route::get('/invoice/{reference}', 'InvoiceController@getInvoice')->name('user.invoice.id');
    Route::post('/invoice', 'InvoiceController@invoicePayment')->name('user.invoice.payment');
    Route::get('/callback', 'InvoiceController@invoiceStatus');

    // route for user dashboard
    Route::get('/', 'HomeController@index')->name('user.dashboard');
});


// routes for the school dashboard
Route::prefix('school')->group(function() {
    // Auth route for school
    Route::get('/login', 'Auth\SchoolLoginController@showLoginForm')->name('school.login');
    Route::post('/login', 'Auth\SchoolLoginController@login')->name('school.login.submit');
    Route::get('/register', 'Auth\SchoolRegisterController@showRegisterForm')->name('school.register');
    Route::post('/register', 'Auth\SchoolRegisterController@register')->name('school.register.submit');

    // Withdraw funds
    Route::post('withdraw', 'WalletController@withdraw')->name('wallet.withdraw');
    Route::get('withdraw-history', 'WalletController@history')->name('withdraw.history');

    // create a new account
    Route::post('/create', 'SchoolDetailsController@create')->name('school.account.create');
    Route::post('/switch-account', 'SchoolDetailsController@switch')->name('school.account.switch');

    // fee structure
    Route::resource('/setup-fees', 'SetupFeesController')->names([
        'index'=>'school.setup.fees'
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

    // support ticket
    Route::resource('/support-ticket', 'SupportTicketController')->names([
        'index' => 'school.support.ticket',
        'store' => 'school.support.post',
        'show'  => 'school.ticket.show',
    ]);
    Route::post('support-reply/{id}', 'SupportTicketController@supportReplyPost')->name('school.reply.post');

    // settings
    Route::resource('/settings', 'SettingsController')->names([
        'index' => 'school.settings'
    ]);

    // router for school dashboard
    Route::get('/', 'SchoolController@index')->name('school.dashboard');
});


// get account name from bank details, used for ajax call
Route::post('/gateway/get_acctname', 'BankDetailsController@getAcctName');

// webhook
Route::prefix('webhooks')->group(function () {
    Route::post('flutterwave/handle', 'Webhook\FlutterwaveWebhookProcessor@handle');
});
