<?php

namespace App\Http\Controllers;

use App\Http\Requests\Prescription\Store;
use App\Models\Drug_prescription;
use Illuminate\Http\Request;

class DrugPrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Drug_prescription::all();
        return view('admin.prescriptions.show_prescriptions', compact('prescriptions'));
    }
    public function create()
    {
        return view('admin.prescriptions.add_prescription');
    }

    public function store(Store $request)
    {
        
        $prescription = new Drug_prescription();
        $prescription->name = $request->name;
        $prescription->price = $request->price;
        $prescription->save();
        return redirect('prescriptions')->with('message', 'Drug Prescription Added Successfully');


    }
    public function delete($id)
    {
        $prescription = Drug_prescription::find($id);
        if($prescription)
        $prescription->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $prescription = Drug_prescription::find($id);
        return view('admin.prescriptions.edit_prescription', compact('prescription'));
    }
    public function update(Store $request, $id)
    {
        $prescription = Drug_prescription::find($id);
            if ($request->name) {
                $prescription->name = $request->name;
            }
            if ($request->price) {
                $prescription->price = $request->price;
            }
            $prescription->save();
            return redirect('prescriptions')->with('message', 'Drug Prescription Updated Successfully');
        
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $prescriptions = Drug_prescription::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
        return view('admin.prescriptions.search_prescriptions', compact('prescriptions'));
    }
}
