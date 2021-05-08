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
    if (auth()->user()->hasRole('superadmin'))
    {
        echo "superadmin";
    } elseif (auth()->user()->hasRole('admin')) {
        echo "admin";
    } elseif (auth()->user()->hasRole('investor')) {
        echo "investor";
    } elseif (auth()->user()->hasRole('partner')) {
        echo "partner";
    } else {
        echo "false";
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
