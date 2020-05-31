<?php

namespace App\Http\Controllers;

use App\Staff;

class RecordController extends Controller
{

    public function checkIn(Staff $staff)
    {
        return $staff->checkIn()
            ? abort(404)
            : back()->with('status', 'Registro de entrada exitoso');
    }

    public function checkOut(Staff $staff)
    {
        return $staff->checkOut()
            ? abort(404)
            : back()->with('status', 'Registro de salida exitoso');
    }

}
