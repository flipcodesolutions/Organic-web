<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Purchase;
use App\Models\OrderMaster;
use App\Models\OrderDetail;


use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function purchasePdf(){
            
        $purchase=Purchase::with("productData")->get();
        $data=['purchase'=>$purchase];
        $pdf = Pdf::loadView('admin.reports.purchasePdf',$data);
        $pdf = Pdf::loadView('pdf.report', [
            'title' => 'Product Report',
            'selected_date' => $request->date,
            'data' => $data
        ]);
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
   
   //$data=['data'=>$data];
  
   $data = [
    'data' => $data,
    'start_date' => $start_date,
    'end_date' => $end_date
];
        $pdf = Pdf::loadView('admin.reports.purchaseDateWisePDF',$data)->setPaper('a4', 'potrait');
        return $pdf->download('purchaseReport.pdf');
    }

    public function billPDF(){
        $orderid=session('orderid');
        // return $orderid;
       // $data = OrderMaster::with(['user', 'orderDetails.product', 'shippingAddress'])->find($orderid);
        
       $data = OrderMaster::find($orderid);
       $data=['data'=>$data];
        // return $data;
        $pdf = Pdf::loadView('admin.reports.billPDF', $data)->setPaper('a4', 'potrait');
        return $pdf->download('Bill.pdf');
    }
}
