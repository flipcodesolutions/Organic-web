<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;

Route::get('/admin', function () {
    return view('auth.login');
});



require __DIR__ . '/visitor.php';

Auth::routes();

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function () {
    require __DIR__ . '/joy.php';
    require __DIR__ . '/gunjan.php';
    require __DIR__ . '/rahul.php';
    require __DIR__ . '/bhavana.php';
    require __DIR__ . '/hardik.php';
    // require __DIR__ . '/visitor.php';

    // Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);

});
