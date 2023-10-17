<?php

namespace App\Http\Controllers\Admin\Report;

use App\Exports\DebitorExport;
use App\Http\Controllers\Controller;
use App\Models\Debtors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class DebitReportController extends Controller
{
    public function index(Request $request)
    {
        if($request->start_date != null && $request->end_date != null){
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $debtors = Debtors::where('created_at', '>=', Carbon::parse($start_date)->format('Y-m-d'))
                ->where('created_at', '<=',  Carbon::parse($end_date)->format('Y-m-d'))->get();
        }else{
            $debtors = [];
            $start_date = null;
            $end_date = null;
        }
        return view('reports.debit.index', compact('debtors', 'start_date', 'end_date'));
    }

    public function debitReportDataShow(Request $request){
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        $debtors = Debtors::where('created_at', '>=', Carbon::parse($start_date)->format('Y-m-d'))
                ->where('created_at', '<=',  Carbon::parse($end_date)->format('Y-m-d'))->get();
        return view('reports.debit.debit-report-data-show', compact('debtors', 'start_date', 'end_date'));
    }

    public function debitReportDataDownload($start_date, $end_date)
    {
        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');
        $debtors = Debtors::whereDate('created_at', '>=', Carbon::parse($start_date)->format('Y-m-d'))
                ->whereDate('created_at', '<=',  Carbon::parse($end_date)->format('Y-m-d'))->count();
        if($debtors == 0){
            return redirect()->route('admin.report.debtor.index')->with('emsg', 'No data found');
        }

        return (new DebitorExport($start_date, $end_date))->download('debtors.xlsx');
    }
}
