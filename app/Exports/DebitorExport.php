<?php

namespace App\Exports;

use App\Models\Debtors;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DebitorExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
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
    public function map($debtor): array
    {
        return [
            $debtor->id,
            $debtor->name,
            $debtor->company ?? '',
            $debtor->amount,
            strip_tags($debtor->details),
            $debtor->mobile,
            strip_tags($debtor->address),
            Carbon::parse($debtor->deal_date)->format('Y-m-d'),
            Carbon::parse($debtor->recovery_date)->format('Y-m-d'),
        ];
    }

    public function headings(): array
    {
        return [
            'Sl.',
            'Name',
            'Company',
            'Amount',
            'Items',
            'Mobile',
            'Address',
            'Deal Date',
            'Recovery Date',
        ];
    }

    public function query()
    {
        return Debtors::query()->where('created_at', '>=', Carbon::parse($this->start_date)->format('Y-m-d'))
        ->where('created_at', '<=',  Carbon::parse($this->end_date)->format('Y-m-d'));
    }
}
