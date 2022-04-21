<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;

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

Route::get('/', function (Request $request) {
    $message = 'Loading welcome page';
    Log::info($message);
    \FB::log($message); // FirePHP
    Debugbar::debug($message); // Laravel Debugbar
    $request->session()->flash('info', $message);
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('mail/test', [MailController::class, 'test']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('files', FileController::class)->middleware(['auth', 'role:1']);
//Route::resource('files', FileController::class)->middleware(['auth', 'role.any:1,2,3,4']);