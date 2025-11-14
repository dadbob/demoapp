<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\DemoController;

Route::middleware('auth')->group(function () {
    Route::get('/demo', [DemoController::class, 'dashboard'])->name('demo.dashboard');
    Route::get('/demo/users', [DemoController::class, 'users'])->name('demo.users');
    Route::get('/demo/users/{id}', [DemoController::class, 'userDetails'])->name('demo.users.show');
    Route::get('/demo/modals', [DemoController::class, 'modals'])->name('demo.modals');
});
