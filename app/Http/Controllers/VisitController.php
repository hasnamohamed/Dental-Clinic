<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAppointmentRequest;
use App\Models\Diagnosi;
use App\Models\DiagnosisVisit;
use App\Models\Drug_prescription;
use App\Models\DrugVisit;
use App\Models\Patient;
use App\Models\Red_test;
use App\Models\RedVisit;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{

    public function show_appointments()
    {
        $appointments = Visit::with('patient')->get();

        return view('admin.visits.show_appointments', compact('appointments'));
    }
    public function create()
    {
        $patients = Patient::all();
        $drugs = Drug_prescription::all();
        $reds = Red_test::all();
        $diagnosis = Diagnosi::all();
        return view('admin.visits.add_appointments', compact('patients', 'drugs', 'reds', 'diagnosis'));
    }
    
    public function store(AddAppointmentRequest $request)
    {
        $date = Visit::where('date', '=', $request->input('date'))->first();
        $time = Visit::where('time', '=', $request->input('time'))->first();
        if ($date === null || $time === null) {
            $Appointment = new Visit();
            $red_ids = $request->input('red_id');
            $diagnosis_ids = $request->input('diagnosis_id');
            $drug_ids = $request->input('drug_id');
            $Appointment->patient_id = $request->patient_id;
            $Appointment->time = $request->time;
            $Appointment->date = $request->date;
            $Appointment->status = 'In-Progress';
            $Appointment->visit_type = $request->visit_type;
            $Appointment->save();
            if (isset($red_ids)) {
                foreach ($red_ids as $key => $value) {
                    $redvisit = new RedVisit();
                    $redvisit->red_test_id = $value;
                    $redvisit->visit_id = $Appointment->id;
                    $redvisit->save();
                }
            }
            if (isset($drug_ids)) {
                foreach ($drug_ids as $key => $value) {
                    $drugvisit = new DrugVisit();
                    $drugvisit->drug_id = $value;
                    $drugvisit->visit_id = $Appointment->id;
                    $drugvisit->save();
                }
            }
            if (isset($diagnosis_ids)) {
                foreach ($diagnosis_ids as $key => $value) {
                    $diagnoistsvisit = new DiagnosisVisit();
                    $diagnoistsvisit->diagnosis_id = $value;
                    $diagnoistsvisit->visit_id = $Appointment->id;
                    $diagnoistsvisit->save();
                }
            }
            return redirect()->back()->with('message', 'Appointment Added Successfully');
        }
        return redirect()->back()->with('error', 'Duplicated Appointment Date And Time');
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
        $appointments = Visit::whereHas('patient', function ($query) use ($search) {
            $query->where('date', 'like', '%' . $search . '%');
        })->get();
        return view('admin.visits.search_appointments', compact('appointments'));
    }
}
