<?php

namespace App\Http\Controllers;

use App\Http\Requests\Diagnosi\Store;
use App\Models\Diagnosi;
use Illuminate\Http\Request;

class DiagnosiController extends Controller
{
    public function index()
    {
        $diagnosis = Diagnosi::all();
        return view('admin.diagnosis.show_diagnosis', compact('diagnosis'));
    }
    public function create()
    {
        return view('admin.diagnosis.add_diagnosi');
    }

    public function store(Store $request)
    {
        $diagnosi = new Diagnosi();
        $diagnosi->name = $request->name;
        $diagnosi->price = $request->price;
        $diagnosi->save();
        return redirect('diagnosis')->with('message', 'Diagnosis Added Successfully');
    }
    public function delete($id)
    {
        $diagnosi = Diagnosi::find($id);
        if($diagnosi)
        $diagnosi->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $diagnosi = Diagnosi::find($id);
        return view('admin.diagnosis.edit_diagnosi', compact('diagnosi'));
    }
    public function update(Store $request, $id)
    {
        $diagnosi = Diagnosi::find($id);


            if ($request->name) {
                $diagnosi->name = $request->name;
            }
            if ($request->price) {
                $diagnosi->price = $request->price;
            }
            $diagnosi->save();
            return redirect('diagnosis')->with('message', 'Diagnosis Updated Successfully');
     
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $diagnosis = Diagnosi::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
        return view('admin.diagnosis.search_diagnosis', compact('diagnosis'));
    }
}
