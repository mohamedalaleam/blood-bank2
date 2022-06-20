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


Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/donates', [App\Http\Controllers\HomeController::class, 'donates'])->name('donates');
Route::get('/samples', [App\Http\Controllers\HomeController::class, 'samples'])->name('samples');
Route::get('/requests', [App\Http\Controllers\HomeController::class, 'requests'])->name('requests');

Route::post('/savecontact', [App\Http\Controllers\HomeController::class, 'savecontact'])->name('savecontact');

Route::post('/savedonate', [App\Http\Controllers\HomeController::class, 'savedonate'])->name('savedonate');
Route::post('/savesample', [App\Http\Controllers\HomeController::class, 'savesample'])->name('savesample');
Route::post('/saverequest', [App\Http\Controllers\HomeController::class, 'saverequest'])->name('saverequest');

Route::post('/donatefilter', [App\Http\Controllers\HomeController::class, 'donatefilter'])->name('donatefilter');
Route::post('/donatesearch', [App\Http\Controllers\HomeController::class, 'donatesearch'])->name('donatesearch');

Route::post('/requestfilter', [App\Http\Controllers\HomeController::class, 'requestfilter'])->name('requestfilter');
Route::post('/requestsearch', [App\Http\Controllers\HomeController::class, 'requestsearch'])->name('requestsearch');

Route::post('/samplefilter', [App\Http\Controllers\HomeController::class, 'samplefilter'])->name('samplefilter');
Route::post('/samplesearch', [App\Http\Controllers\HomeController::class, 'samplesearch'])->name('samplesearch');
