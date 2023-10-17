<?php

namespace App\Exports;

use App\Models\Creditors;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CreditorExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
    use Exportable;

    public $start_date;
    public $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

        /**
    * @var Invoice $invoice
    */
    public function map($creditor): array
    {
        return [
            $creditor->id,
            $creditor->name,
            $creditor->company ?? '',
            $creditor->amount,
            $creditor->email,
            $creditor->phone,
            $creditor->mobile,
            strip_tags($creditor->address),
            Carbon::parse($creditor->deal_date)->format('Y-m-d'),
            Carbon::parse($creditor->payment_date)->format('Y-m-d'),
        ];
    }

    public function headings(): array
    {
        return [
            'Sl.',
            'Name',
            'Company',
            'Amount',
            'Email',
            'Phone',
            'Mobile',
            'Address',
            'Deal Date',
            'Payment Date',
        ];
    }

    public function query()
    {
        return Creditors::query()->where('created_at', '>=', Carbon::parse($this->start_date)->format('Y-m-d'))
        ->where('created_at', '<=',  Carbon::parse($this->end_date)->format('Y-m-d'));
    }
}
