<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    require __DIR__ . 'routes/joy.php';
    require __DIR__ . 'routes/gunjan.php';
    require __DIR__ . 'routes/rahul.php';
    require __DIR__ . 'routes/bhavana.php';
    require __DIR__ . 'routes/hardik.php';

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


    // test comment for git
});
