<?php

namespace App\Http\Controllers\Admin\Report;

use App\Exports\CreditorExport;
use App\Http\Controllers\Controller;
use App\Models\Creditors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class CreditReportController extends Controller
{
    public function index(Request $request)
    {
        if($request->start_date != null && $request->end_date != null){
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $creditors = Creditors::where('deal_date', '>=', Carbon::parse($start_date)->format('Y-m-d'))
                ->where('deal_date', '<=',  Carbon::parse($end_date)->format('Y-m-d'))->get();
        }else{
            $creditors = [];
            $start_date = null;
            $end_date = null;
        }
        return view('reports.credit.index', compact('creditors', 'start_date', 'end_date'));
    }

    public function creditReportDataShow(Request $request){
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        $creditors = Creditors::where('deal_date', '>=', Carbon::parse($start_date)->format('Y-m-d'))
                ->where('deal_date', '<=',  Carbon::parse($end_date)->format('Y-m-d'))->get();
        return view('reports.credit.credit-report-data-show', compact('creditors', 'start_date', 'end_date'));
    }

    public function creditReportDataDownload(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        $creditors = Creditors::whereDate('deal_date', '>=', Carbon::parse($start_date)->format('Y-m-d'))
                ->whereDate('deal_date', '<=',  Carbon::parse($end_date)->format('Y-m-d'))->count();
        if($creditors == 0){
            return redirect()->route('admin.report.creditor.index')->with('emsg', 'No data found');
        }

        return (new CreditorExport($start_date, $end_date))->download('creditor.xlsx');
    }
}
