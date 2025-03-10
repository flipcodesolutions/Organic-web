<?php


use App\Http\Controllers\vendor\PurchaseController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\admin\OrderMasterController;
use Illuminate\Support\Facades\Route;


//Route::get('reports/purchaseDateWise', [PurchaseController::class, 'purchaseDateWise'])->name('reports.purchaseDateWise');
Route::post('reports/purchaseDateWiseReport', [PurchaseController::class, 'purchaseDateWiseReport'])->name('reports.purchaseDateWiseReport');
Route::get('reports/purchaseDateWisePDF', [PdfController::class, 'purchaseDateWisePDF'])->name('reports.purchaseDateWisePDF');
Route::get('reports/purchaseReport', [PurchaseController::class, 'purchaseReport'])->name('reports.purchaseReport');
//Route::get('reports/purchaseReport/purchasePdf', [PdfController::class, 'purchasePdf'])->name('Report.purchasePdf');

// route for order Report
Route::get('reports/orderReport', [OrderMasterController::class, 'orderReport'])->name('reports.orderReport');

Route::get('reports/bill/{id?}', [OrderMasterController::class, 'billgeneration'])->name('reports.bill');
?>

