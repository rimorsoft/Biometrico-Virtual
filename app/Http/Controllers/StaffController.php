<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function search(Request $request)
    {
        return view('record', [
            'staff'   => $staff = Staff::where('code', $request->code)->firstOrFail(),
            'records' => $staff->records()->latest()->paginate()
        ]);
    }
}
