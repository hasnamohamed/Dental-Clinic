<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAppointmentRequest;
use App\Models\Diagnosi;
use App\Models\Drug_prescription;
use App\Models\Patient;
use App\Models\Red_test;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
 
    public function show_appointments()
    {
        $appointments = Visit::with('patient')->get()->first();
        return view('admin.visits.show_appointments', compact('appointments'));
    }
    public function create()
    {
        $patients=Patient::all();
        $drugs=Drug_prescription::all();
        $reds=Red_test::all();
        $diagnosis=Diagnosi::all();
        return view('admin.visits.add_appointments',compact('patients','drugs','reds','diagnosis'));
    }

    public function store(AddAppointmentRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->only(['patient_id', 'time', 'date', 'status','visit_type']);
            $date = Visit::where('date', '=', $request->input('date'))->first();
            $time = Visit::where('time', '=', $request->input('time'))->first();
            if ($date === null || $time ===null ) {
                if ($validated) {
                    $Appointment = new Visit();
                    $Appointment->patient_id = $request->patient_id;
                    $Appointment->time = $request->time;
                    $Appointment->date = $request->date;
                    $Appointment->status = 'In-Progress';
                    $Appointment->visit_type = $request->visit_type;

                    $Appointment->save();
                    return redirect()->back()->with('message', 'Appointment Added Successfully');
                } 
                else {
                    return redirect()->back()
                        ->withErrors($validated)
                        ->withInput();
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Duplicated Appointment Date And Time');
            }

    }

    public function approved($id)
    {
        $appointments = Visit::find($id);

        if ($appointments->status == 'In-Progress') {
            $appointments->status = 'Approved';
        } elseif ($appointments->status == 'Approved') {
            $appointments->status = 'In-Progress';
        } else {
            $appointments->status = 'Approved';
        }

        $appointments->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $appointments = Visit::find($id);
        $appointments->status = 'Canceled';
        $appointments->save();
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $appointments = Visit::whereHas('patient', function ($query) use($search) {
            $query->where('date', 'like', '%'.$search.'%');
        })->get();
        return view('admin.visits.search_appointments', compact('appointments'));
    }
}
