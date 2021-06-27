<?php


class TitleController extends Controller
{
    public function index()
    {
        $titles = Title::all();
        $data['titles'] = $titles;
        self::CreateView('TitleIndex', $data);
    }

    public function create()
    {
        self::CreateView('TitleAdd');
    }


    public function store($request)
    {
        Title::save($request['type']);
        $this->index();
    }

    public function edit($req)
    {
        $title = Title::find($req['id']);
        $data['title'] = $title;
        self::CreateView('TitleEdit', $data);
    }


    public function update($request)
    {

        Title::update($request['id'], $request['type']);

        $this->edit(['id' => $request['id']]);
    }

    public function delete($request)
    {
        Title::delete($request['id']);
        $this->index();
    }
}