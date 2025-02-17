<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

Route::get('permission/index', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('permission/edit/{id?}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('permission/update/{id?}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('permission/show/{id?}', [PermissionController::class, 'show'])->name('permission.show');
    Route::get('permission/delete/{id?}', [PermissionController::class, 'delete'])->name('permission.delete');
?>