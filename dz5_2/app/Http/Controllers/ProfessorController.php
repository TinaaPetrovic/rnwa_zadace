<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Department;
use App\Models\Title;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{

    public function index()
    {
        $professors = Professor::all()->load(['department', 'titles']);
        return view('professors.index')->with('professors', $professors);
    }

    public function create()
    {
        return view('professors.create')->with('departments', Department::all())->with('titles', Title::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'DepartmentId' => 'required',
        ]);
        $professor  = new Professor();
        $professor->Name = $request['Name'];
        $professor->Departaments_DepartamentId = $request['DepartmentId'];
        $professor->save();

        $professor->titles()->attach($request['titles']);

        return redirect()->route('professors.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }


    public function edit($id)
    {
        return view('professors.edit')->with('professor', Professor::all()->find($id))->with('departments', Department::all())->with('titles', Title::all());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required',
            'DepartmentId' => 'required',
        ]);
        $professor  = Professor::all()->find($id);
        $professor->Name = $request['Name'];
        $professor->Departaments_DepartamentId = $request['DepartmentId'];
        $professor->save();

        $professor->titles()->sync($request['titles']);

        return redirect()->route('professors.index');

    }


    public function destroy($id)
    {
        $professor = Professor::all()->find($id);
        $professor->titles()->detach();
        $professor->delete();
        return redirect()->route('professors.index');
    }
}
