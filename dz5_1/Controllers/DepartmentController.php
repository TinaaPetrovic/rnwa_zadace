<?php


class DepartmentController extends Controller
{
    public function index()
    {
        $deps = Department::all();
        $data['departments'] = $deps;
        self::CreateView('DepartmentIndex', $data);
    }

    public function create()
    {
        self::CreateView('DepartmentAdd');
    }


    public function store($request)
    {
        Department::save($request['name']);
        $this->index();
    }

    public function edit($req)
    {
        $department = Department::find($req['id']);
        $data['department'] = $department;
        self::CreateView('DepartmentEdit', $data);
    }


    public function update($request)
    {

        Department::update($request['id'], $request['name']);

        $this->edit(['id' => $request['id']]);
    }

    public function delete($request)
    {
        Department::delete($request['id']);
        $this->index();
    }
}