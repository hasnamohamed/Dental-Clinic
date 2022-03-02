<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patients.show_patients', compact('patients'));
    }
    public function create()
    {
        return view('admin.patients.add_patient');
    }

    public function store(AddPatientRequest $request)
    {
        
            $user = Patient::where('phone', '=', $request->input('phone'))->first();
            if ($user === null) {
                    $patient = new Patient();
                    $patient->name = $request->name;
                    $patient->phone = $request->phone;
                    $patient->age = $request->age;
                    $patient->gender = $request->gender;
                    $patient->save();
                    return redirect()->back()->with('message', 'Patient Added Successfully');
                } 

                return redirect()->back()->with('error', 'Duplicated Phone Number');
            

    }
    //=========== Delete Doctor
    public function delete($id)
    {
        $patient = Patient::find($id);
        $patient->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('admin.patients.edit_patient', compact('patient'));
    }
    public function update(UpdatePatientRequest $request, $id)
    {
        $patient = Patient::find($id);
        $validated = $request->validated();
        $validated = $request
            ->safe()
            ->only(['name', 'phone', 'gender', 'age']);
        if ($validated) {

            if ($request->name) {
                $patient->name = $request->name;
            }
            if ($request->phone) {
                $patient->phone = $request->phone;
            }
            if ($request->age) {
                $patient->age = $request->age;
            }
            if ($request->gender) {
                $patient->gender = $request->gender;
            }

            $patient->save();
            return redirect('patients')->with('message', 'Patient Updated Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $patients = Patient::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->get();
        return view('admin.patients.search_patients', compact('patients'));
    }
}
