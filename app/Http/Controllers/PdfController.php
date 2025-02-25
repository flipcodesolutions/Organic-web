<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Purchase;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    function purchasePdf(){
        // return "hello";
        $purchase=Purchase::get();
        $data=['purchase'=>$purchase];
        $pdf = Pdf::loadView('admin.reports.purchasePdf',$data);
        return $pdf->download('purchaseReport.pdf');
    }
}
