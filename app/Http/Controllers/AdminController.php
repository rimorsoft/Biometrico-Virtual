<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Record;

use App\Exports\RecordsExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $records = Record::with('staff')->latest()->paginate();

        return view('admin', compact('records'));
    }

    public function staff(Staff $staff)
    {
        $records = $staff->records()->latest()->paginate();

        return view('staff', compact('staff', 'records'));
    }

    public function export($staff = false)
    {
        return Excel::download(new RecordsExport($staff), 'records.xlsx');
    }
}
