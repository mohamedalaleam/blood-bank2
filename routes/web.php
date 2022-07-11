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



Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home1');

Auth::routes(['register' => false]);

Auth::routes();

Route::get('/donates', [App\Http\Controllers\HomeController::class, 'donates'])->name('donates');
Route::get('/samples', [App\Http\Controllers\HomeController::class, 'samples'])->name('samples');
Route::get('/requests', [App\Http\Controllers\HomeController::class, 'requests'])->name('requests');

Route::post('/savecontact', [App\Http\Controllers\HomeController::class, 'savecontact'])->name('savecontact');

Route::post('/review_donate', [App\Http\Controllers\HomeController::class, 'review_donate'])->name('review_donate');

Route::post('/savedonate', [App\Http\Controllers\HomeController::class, 'savedonate'])->name('savedonate');
Route::post('/saverequest', [App\Http\Controllers\HomeController::class, 'saverequest'])->name('saverequest');

Route::post('/donatefilter', [App\Http\Controllers\HomeController::class, 'donatefilter'])->name('donatefilter');
Route::post('/donatesearch', [App\Http\Controllers\HomeController::class, 'donatesearch'])->name('donatesearch');

Route::post('/requestfilter', [App\Http\Controllers\HomeController::class, 'requestfilter'])->name('requestfilter');
Route::post('/requestsearch', [App\Http\Controllers\HomeController::class, 'requestsearch'])->name('requestsearch');

Route::post('/samplefilter', [App\Http\Controllers\HomeController::class, 'samplefilter'])->name('samplefilter');
Route::post('/samplesearch', [App\Http\Controllers\HomeController::class, 'samplesearch'])->name('samplesearch');


// Admin Routes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/donatesAdmin', [App\Http\Controllers\HomeController::class, 'donatesAdmin'])->name('donatesAdmin')->middleware('auth');
Route::get('/samplesAdmin', [App\Http\Controllers\HomeController::class, 'samplesAdmin'])->name('samplesAdmin')->middleware('auth');
Route::get('/requestsAdmin', [App\Http\Controllers\HomeController::class, 'requestsAdmin'])->name('requestsAdmin')->middleware('auth');
Route::get('/contactAdmin', [App\Http\Controllers\HomeController::class, 'contactAdmin'])->name('contactAdmin')->middleware('auth');

Route::post('/savesample', [App\Http\Controllers\HomeController::class, 'savesample'])->name('savesample')->middleware('auth');

Route::delete('/adminDeleteDonates/{id}', [App\Http\Controllers\HomeController::class, 'adminDeleteDonates'])->name('adminDeleteDonates')->middleware('auth');
Route::delete('/adminDeleteSamples/{id}', [App\Http\Controllers\HomeController::class, 'adminDeleteSamples'])->name('adminDeleteSamples')->middleware('auth');
Route::delete('/adminDeleterequest/{id}', [App\Http\Controllers\HomeController::class, 'adminDeleterequest'])->name('adminDeleteRequest')->middleware('auth');
Route::delete('/delete_contact/{id}', [App\Http\Controllers\HomeController::class, 'delete_contact'])->name('delete_contact')->middleware('auth');

Route::post('/Admindonatefilter', [App\Http\Controllers\HomeController::class, 'Admindonatefilter'])->name('Admindonatefilter')->middleware('auth');
Route::post('/Admindonatesearch', [App\Http\Controllers\HomeController::class, 'Admindonatesearch'])->name('Admindonatesearch')->middleware('auth');

Route::post('/Adminsamplefilter', [App\Http\Controllers\HomeController::class, 'Adminsamplefilter'])->name('Adminsamplefilter')->middleware('auth');
Route::post('/Adminsamplesearch', [App\Http\Controllers\HomeController::class, 'Adminsamplesearch'])->name('Adminsamplesearch')->middleware('auth');

Route::post('/Adminrequestfilter', [App\Http\Controllers\HomeController::class, 'Adminrequestfilter'])->name('Adminrequestfilter')->middleware('auth');
Route::post('/Adminrequestsearch', [App\Http\Controllers\HomeController::class, 'Adminrequestsearch'])->name('Adminrequestsearch')->middleware('auth');

Route::post('/editSample', [App\Http\Controllers\HomeController::class, 'editSample'])->name('editSample')->middleware('auth');
