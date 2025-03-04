<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Purchase;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function purchasePdf(){
            
        $purchase=Purchase::with("productData")->get();
        $data=['purchase'=>$purchase];
        $pdf = Pdf::loadView('admin.reports.purchasePdf',$data);
        return $pdf->download('purchaseReport.pdf');
    }
    public function purchaseDateWisePDF(){
            
        // $purchase=Purchase::with("productData")->get();
        // $data=['purchase'=>$purchase];
        $start_date=session('start_date');
        $end_date=session('end_date');
        $data=Purchase::with("productData")->whereDate('date', '>=', $start_date)
        ->whereDate('date', '<=', $end_date)
        ->get();
   
   $data=['data'=>$data];
        $pdf = Pdf::loadView('admin.reports.purchaseDateWisePDF',$data)->setPaper('a4', 'potrait');
        return $pdf->download('purchaseReport.pdf');
    }
}
