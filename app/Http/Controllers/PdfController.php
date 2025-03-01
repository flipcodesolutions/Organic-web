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
    public function purchaseDateWisePDF(Request $request){
            
        // $purchase=Purchase::with("productData")->get();
        // $data=['purchase'=>$purchase];
        $data=Purchase::with("productData")->whereDate('date', '>=', $request->start_date)
        ->whereDate('date', '<=', $request->end_date)
        ->get();
   
   $data=['data'=>$data];
        $pdf = Pdf::loadView('admin.reports.purchaseDateWisePDF',$data);
        return $pdf->download('purchaseReport.pdf');
    }
}
