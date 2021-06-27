<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TitleController extends Controller
{

    public function index()
    {
        $titles = Title::all();
        return view('titles.index')->with('titles', $titles);
    }


    public function create()
    {
        return view('titles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'Type' => 'required',
        ]);
        $title  = new Title();
        $title->Type = $request['Type'];
        $title->save();

        return redirect()->route('titles.index');
    }

    public function show(Title $title)
    {
        //
    }


    public function edit($id)
    {
        $title = Title::all()->find($id);
        return view('titles.edit')->with('title', $title);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'Type' => 'required',
        ]);
        $title = Title::all()->find($id);
        $title->Type = $request['fname'];
        $title->save();

        return redirect()->route('titles.index');
    }


    public function destroy($id)
    {
        Title::all()->find($id)->delete();
        return redirect()->route('titles.index');
    }
}
