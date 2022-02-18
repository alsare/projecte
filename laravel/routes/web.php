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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

use Illuminate\Support\Facades\Log;
Route::get('/', function () {
   Log::info('Loading welcome page');
   return view('welcome');
});

use App\Http\Controllers\MailController;
// ...
Route::get('mail/test', [MailController::class, 'test']);
// Route::get('mail/test', 'App\Http\Controllers\MailController@test');


use Illuminate\Http\Request;
// ...
Route::get('/', function (Request $request) {
   $message = 'Loading welcome page';
   Log::info($message);
   $request->session()->flash('info', $message);
   return view('welcome');
});