<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Purchase;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    function purchasePdf(){
            
        $purchase=Purchase::with("productData")->get();
        $data=['purchase'=>$purchase];
        $pdf = Pdf::loadView('admin.reports.purchasePdf',$data);
        return $pdf->download('purchaseReport.pdf');
    }
}
