<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    public function index(Request $request)
    {
        if($request->start_date != null && $request->end_date != null){
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $sales = SaleProduct::whereHas('sale', function($query) use($start_date, $end_date){
                $query->where('invoice_create_date', '>=', Carbon::parse($start_date)->format('Y-m-d'))
                ->where('invoice_create_date', '<=',  Carbon::parse($end_date)->format('Y-m-d'));
            })->get();
        }else{
            $sales = [];
            $start_date = null;
            $end_date = null;
        }
        return view('reports.sale.index', compact('sales', 'start_date', 'end_date'));
    }

    public function saleReportDataShow(Request $request){
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        $sales = SaleProduct::whereHas('sale', function($query) use($start_date, $end_date){
            $query->where('invoice_create_date', '>=', Carbon::parse($start_date)->format('Y-m-d'))
            ->where('invoice_create_date', '<=',  Carbon::parse($end_date)->format('Y-m-d'));
        })->get();
        return view('reports.sale.sale-report-data-show', compact('sales', 'start_date', 'end_date'));
    }
}
