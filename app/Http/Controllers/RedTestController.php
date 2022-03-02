<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedTest\Store;
use App\Models\Red_test;
use Illuminate\Http\Request;

class RedTestController extends Controller
{
    public function index()
    {
        $redTests = Red_test::all();
        return view('admin.red_tests.show_red_tests', compact('redTests'));
    }
    public function create()
    {
        return view('admin.red_tests.add_red_test');
    }

    public function store(Store $request)
    {
        
        $redTest = new Red_test();
        $redTest->name = $request->name;
        $redTest->price = $request->price;
        $redTest->save();
        return redirect('redtests')->with('message', 'Red Test Added Successfully');      
    }
    public function delete($id)
    {
        $redTest = Red_test::find($id);
        if($redTest)
        $redTest->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $redTest = Red_test::find($id);
        return view('admin.red_tests.edit_red_test', compact('redTest'));
    }
    public function update(Store $request, $id)
    {
        $redTest = Red_test::find($id);
   
            if ($request->name) {
                $redTest->name = $request->name;
            }
            if ($request->price) {
                $redTest->price = $request->price;
            }
            $redTest->save();
            return redirect('redtests')->with('message', 'Red Test Updated Successfully');
     
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $redTests = Red_test::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
        return view('admin.red_tests.search_red_tests', compact('redTests'));
    }
}
