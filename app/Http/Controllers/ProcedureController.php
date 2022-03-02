<?php

namespace App\Http\Controllers;

use App\Models\Diagnosi;
use App\Models\Drug_prescription;
use App\Models\Red_test;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    public function index()
    {
        $diagnosis = Diagnosi::all();
        $prescriptions= Drug_prescription::all();
        $redTests= Red_test::all();
        return view('admin.procedures.show_procedures', compact('diagnosis','prescriptions','redTests'));
    }
}
