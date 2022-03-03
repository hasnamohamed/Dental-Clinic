<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Diagnosi;
use App\Models\DiagnosisVisit;
use App\Models\Drug_prescription;
use App\Models\DrugVisit;
use App\Models\Red_test;
use App\Models\RedVisit;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class BillController extends Controller
{
    public function index($id)
    {
        $bill = Bill::with('visit')->where('visit_id', '=', $id)->first();
        $redvisit = RedVisit::where('visit_id', '=', $id)->get();
        $red=[]; $i=0;
        $total=0;
        foreach($redvisit as $ff){
        $redd = Red_test::where('id', '=', $ff->red_test_id)->first();
        $red[$i] =[
            'name'=>$redd->name,
            'price'=>$redd->price,
        ];
        $i++;
        $total+=$redd->price;
        }

        $drugvisit = DrugVisit::where('visit_id', '=', $id)->get();
        $drug=[]; $i=0;
        foreach($drugvisit as $ff){
        $drugg = Drug_prescription::where('id', '=', $ff->drug_id)->first();
        $drug[$i] =[
            'name'=>$drugg->name,
            'price'=>$drugg->price,
        ];
        $i++;
        $total+=$drugg->price;
        }

        $diagvisit = DiagnosisVisit::where('visit_id', '=', $id)->get();
        $diag=[]; $i=0;
        foreach($diagvisit as $ff){
        $diagg = Diagnosi::where('id', '=', $ff->diagnosis_id)->first();
        $diag[$i] =[
            'name'=>$diagg->name,
            'price'=>$diagg->price,
        ];
        $i++;
        $total+=$diagg->price;
        }
        

        return view('admin.bills.show_bill', compact('bill','red','diag','drug','total'));
    }
    public function delete($id)
    {
        $bill = Bill::find($id);
        if($bill)
        $bill->delete();
        return redirect()->back();
    }
}
