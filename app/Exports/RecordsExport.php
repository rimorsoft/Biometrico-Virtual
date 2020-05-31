<?php

namespace App\Exports;

use App\Record;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RecordsExport implements FromView
{
    private $staff;

    public function __construct($staff = false)
    {
        $this->staff = $staff;
    }

    public function view(): View
    {
        $collections = Record::with('staff')
        ->where(function ($query) {
            if($this->staff)
                $query->where('staff_id', $this->staff);
        })
        ->latest()->get();

        return view('exports.records', [
            'records' => $collections
        ]);
    }
}
