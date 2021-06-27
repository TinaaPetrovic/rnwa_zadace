<?php


class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        $data['professors'] = $professors;
        self::CreateView('ProfessorsIndex', $data);
    }

    public function create()
    {
        $departments = Department::all();
        $titles = Title::all();

        $data['departments'] = $departments;
        $data['titles'] = $titles;
        self::CreateView('ProfessorsAdd', $data);
    }


    public function store($request)
    {
        Professor::save($request['name'],$request['dep_id'],$request['titles']);
        $this->index();
    }

    public function edit($req)
    {
        $departments = Department::all();
        $titles = Title::all();
        $professor = Professor::find($req['id']);

        $data['departments'] = $departments;
        $data['titles'] = $titles;
        $data['professor'] = $professor;
        self::CreateView('ProfessorsEdit', $data);
    }


    public function update($request)
    {

        Professor::update($request['id'],$request['name'],$request['dep_id'],$request['titles']);

        $this->edit(['id' => $request['id']]);
    }

    public function delete($request)
    {
        Professor::delete($request['id']);
        $this->index();
    }
}