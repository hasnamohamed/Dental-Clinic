<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index($id)
    {
        $bill = Bill::with('visit')->where('visit_id', '=', $id)->first();
        return view('admin.bills.show_bill', compact('bill'));
    }
    public function delete($id)
    {
        $bill = Bill::find($id);
        if($bill)
        $bill->delete();
        return redirect()->back();
    }
}
