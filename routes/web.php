<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['as' => 'email.'], function () {
    Route::get('emails', 'EmailController@index')->name('emails');
});

Route::post('password/reset', 'Joselfonseca\LighthouseGraphQLPassport\GraphQL\Mutations\ForgotPassword@resolve')->name('password.reset');
Route::get('emails/harvest/{maildirname}', 'EmailController@harvest')->name('emails');

// invoice
Route::get('invoice/random', 'invoice\RandomController@random')->name('invoice-random');
Route::get('invoice/advanced/{locale}', 'invoice\AdvancedUsageController@advanced')->name('invoice-advanced');
Route::get('invoice/alternatives/{gig}', 'invoice\AlternativesController@alternatives')->name('invoice-alternatives');

// Route::get('invoice/advanced/{locale}', function ($locale) {
//     if (! in_array($locale, ['en', 'nl'])) {
//         abort(400);
//     }

//     App::setLocale($locale);

//     Route::get('invoice/advanced', 'invoice\AdvancedUsageController@advanced')->name('invoice-advanced');
// });