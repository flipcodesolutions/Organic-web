<?php


use App\Http\Controllers\vendor\PurchaseController;
use App\Http\Controllers\PdfController;

use Illuminate\Support\Facades\Route;



Route::get('reports/purchaseReport', [PurchaseController::class, 'purchaseReport'])->name('reports.purchaseReport');
Route::get('reports/purchaseReport/purchasePdf', [PdfController::class, 'purchasePdf'])->name('Report.purchasePdf');
?>