<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderMaster;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Purchase;


use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function purchasePdf()
    {

        $purchase = Purchase::with("productData")->get();
        $data = ['purchase' => $purchase];
        $pdf = Pdf::loadView('admin.reports.purchasePdf', $data);
        $pdf = Pdf::loadView('pdf.report', [
            'title' => 'Product Report',
            'selected_date' => $request->date,
            'data' => $data
        ]);
        return $pdf->download('purchaseReport.pdf');
    }
    public function purchaseDateWisePDF()
    {

        // $purchase=Purchase::with("productData")->get();
        // $data=['purchase'=>$purchase];
        $start_date = session('start_date');
        $end_date = session('end_date');
        $user = auth()->user();

        $query = Purchase::with("productData")
        ->whereDate('date', '>=', $start_date)
        ->whereDate('date', '<=', $end_date);

         if ($user->role === 'vendor') {
        $query->whereHas('productData', function ($q) use ($user) {
            $q->where('product_id', $user->id);
        });
    }

    $data = $query->get();

        // $data = Purchase::with("productData")->whereDate('date', '>=', $start_date)
        //     ->whereDate('date', '<=', $end_date)
        //     ->get();

         $pdfData = [
        'data' => $data,
        'start_date' => $start_date,
        'end_date' => $end_date,
      ];

      $pdf = Pdf::loadView('admin.reports.purchaseDateWisePDF', $pdfData)
        ->setPaper('a4', 'portrait');
        //$data=['data'=>$data];

        // $data = [
        //     'data' => $data,
        //     'start_date' => $start_date,
        //     'end_date' => $end_date
        // ];
        // $pdf = Pdf::loadView('admin.reports.purchaseDateWisePDF', $data)->setPaper('a4', 'potrait');
        return $pdf->download('purchaseReport.pdf');
    }

    public function invoicePDF($id)
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $order = OrderMaster::with('orderDetails', 'orderDetails.product', 'orderDetails.unit', 'orderDetails.unit.unitMaster')->find($id);
        // return $order;
        // return view('visitor.invoicePDF', compact('order'));
        // $users = User::get();

        $data = [
            'order' => $order,
            'logo_path' => public_path('visitor/images/logo.svg')
        ];

        $pdf = PDF::loadView('visitor.invoicePDF', $data);

        return $pdf->download('invoice.pdf');
    }
}
