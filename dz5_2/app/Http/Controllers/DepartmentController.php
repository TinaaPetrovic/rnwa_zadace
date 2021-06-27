<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Professor;
use App\Models\Title;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DepartmentController extends Controller{
    public function index()
    {
        $deps = Department::all();
        return view('departments.index')->with('departments',$deps);
    }

    public function create()
    {
        return view('departments.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
        ]);
        $department  = new Department();
        $department->Name = $request['Name'];
        $department->Faculties_FacultyId = 1;
        $department->save();

        return redirect()->route('departments.index');
    }

    public function edit($id)
    {
        $department = Department::all()->find($id);
        return view('departments.edit')->with('department', $department);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'Name' => 'required',
        ]);
        $department  = Department::all()->find($id);
        $department->pcontent = $request['Name'];
        $department->save();

        return redirect()->route('departments.index');


    }

    public function destroy($id)
    {
        Department::all()->find($id)->delete();
        return redirect()->route('departments.index');
    }
}
