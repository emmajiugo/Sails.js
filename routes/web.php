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

    // route for user support
    Route::get('/support', 'UserSupportController@index')->name('user.support');

    // route for savings plan
    Route::get('/savings-plan', 'UserSavingsController@index')->name('user.savings');

    // route to implement search
    Route::post('/ajax-search', 'UserSearchController@ajaxSearch');//index ajax search
    Route::post('/search', 'UserSearchController@postSearch')->name('user.search.post');
    Route::post('/search/school', 'UserSearchController@postSchool')->name('user.school.post');
    Route::post('/search/school-continue', 'UserSearchController@postForInvoice')->name('user.invoice.post');

    // route to invoice
    Route::get('/invoices', 'InvoiceController@index')->name('user.invoice');
    Route::get('/invoice/{reference}', 'InvoiceController@getInvoice')->name('user.invoice.id');

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

    // create a new account
    Route::post('/create', 'SchoolDetailsController@create')->name('school.account.create');
    Route::post('/switch-account', 'SchoolDetailsController@switch')->name('school.account.switch');

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
    Route::view('/report', 'school.report')->middleware('auth:school');

    // support ticket
    Route::resource('/support-ticket', 'SupportTicketController');

    // settings
    Route::resource('/settings', 'SettingsController');

    // unfinished section
    Route::view('/pay-staff', 'school.pay-staff')->middleware('auth:school');

    // router for school dashboard
    Route::get('/', 'SchoolController@index')->name('school.dashboard');
});


// bank details
Route::post('/gateway/get_acctname', 'BankDetailsController@getAcctName');
