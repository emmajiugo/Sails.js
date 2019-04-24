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

    // route for dashboard
    Route::get('/', 'HomeController@index')->name('user.dashboard');
});

// routes for the school dashboard
Route::prefix('school')->group(function() {
    // Auth route for school
    Route::get('/login', 'Auth\SchoolLoginController@showLoginForm')->name('school.login');
    Route::post('/login', 'Auth\SchoolLoginController@login')->name('school.login.submit');
    Route::get('/register', 'Auth\SchoolRegisterController@showRegisterForm')->name('school.register');
    Route::post('/register', 'Auth\SchoolRegisterController@register')->name('school.register.submit');

    // fee structure
    Route::resource('/setup-fees', 'SetupFeesController');

    // view setup fees
    Route::get('/view-setup/{section}', 'ViewSetupsController@index');
    Route::post('/view-setup', 'ViewSetupsController@search')->name('setup.search');
    Route::post('/view-setup/addbreakdown', 'ViewSetupsController@addbreakdown')->name('setup.addbreakdown');
    Route::put('/view-setup/{id}', 'ViewSetupsController@update')->name('setup.update');
    Route::delete('/view-setup/{id}', 'ViewSetupsController@destroy')->name('setup.delete');

    // advance view
    Route::resource('/advance-view', 'AdvanceViewController');

    // feedback
    Route::get('/feedback', 'FeedBackController@index')->name('school.feedback');
    Route::post('/feedback', 'FeedBackController@postFeedback')->name('school.feedback.submit');

    // transaction history & report
    Route::get('/history', 'TransactionController@index');
    Route::view('/report', 'school.report');

    // bank details
    Route::resource('/bank_details', 'BankDetailsController');
    Route::post('/paystack/get_acctname', 'BankDetailsController@getAcctName');

    // support ticket
    Route::resource('/support-ticket', 'SupportTicketController');

    // settings
    Route::resource('/settings', 'SettingsController');

    // unfinished section
    Route::view('/pay-staff', 'school.pay-staff');
    Route::view('/pay-bills', 'school.pay-bills');
    
    
    // router for dashboard
    Route::get('/', 'SchoolController@index')->name('school.dashboard');
});
 