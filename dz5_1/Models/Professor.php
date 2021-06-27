<?php


class Professor
{
    public $id;
    public $name;
    public $department_id;
    public $department_name;
    public $titles = [];


    /**
     * Professor constructor.
     * @param $id
     * @param $name
     * @param $department_id
     * @param $department_name
     */
    public function __construct($id, $name, $department_id, $department_name, $titles)
    {
        $this->id = $id;
        $this->name = $name;
        $this->department_id = $department_id;
        $this->department_name = $department_name;
        $this->titles = $titles;
    }


    public static function all() {
        $list = [];
        $req = Database::query("SELECT p.*, d.DepartamentId,d.Name AS DepartmentName from professors p inner join departaments d on p.Departaments_DepartamentId = d.DepartamentId ");
        foreach($req as $professor) {
            $id = $professor['ProfessorId'];
            $req2 = Database::query("SELECT * FROM professors_titles p INNER JOIN titles t ON p.Titles_TitleId=t.TitleId where p.Professors_ProfessorId = '$id'");
            foreach ($req2 as $title){
                $titles[]=new Title($title['TitleId'],$title['Type']);
            }
            $list[] = new Professor($professor['ProfessorId'],$professor['Name'],$professor['DepartamentId'],$professor['DepartmentName'],$titles);
            $titles =[];
        }
        return $list;
    }

    public static function find($id) {
        $req = Database::query("SELECT p.*, d.DepartamentId,d.Name AS DepartmentName from professors p inner join departaments d on p.Departaments_DepartamentId = d.DepartamentId where p.ProfessorId = '$id'");
        $professor = $req[0];
        $req2 = Database::query("SELECT * FROM professors_titles p INNER JOIN titles t ON p.Titles_TitleId=t.TitleId where p.Professors_ProfessorId = '$id'");
        foreach ($req2 as $title){
            $titles[]=new Title($title['TitleId'],$title['Type']);
        }
        return new Professor($professor['ProfessorId'],$professor['Name'],$professor['DepartamentId'],$professor['DepartmentName'],$titles);
    }

    public static function save($name,$dep_id, $titles)
    {
        Database::query("insert into professors (Name,Departaments_DepartamentId) values ('$name','$dep_id')");
        $req = Database::query("SELECT * from professors");
        $prof_id = $req[count($req)-1]['ProfessorId'];
        foreach ($titles as $title){
            Database::query("insert into professors_titles (Professors_ProfessorId,Titles_TitleId) values ('$prof_id', '$title')");
        }
    }

    public static function update($id,$name,$dep_id, $titles)
    {
        Database::query("update professors set Name = '$name',Departaments_DepartamentId = '$dep_id' where ProfessorId = '$id'");

        Database::query("delete from professors_titles where Professors_ProfessorId = '$id'");
        foreach ($titles as $title){
            Database::query("insert into professors_titles (Professors_ProfessorId,Titles_TitleId) values ('$id', '$title')");
        }
    }

    public static function delete($id)
    {
        Database::query("delete from professors_titles where Professors_ProfessorId = '$id'");
        Database::query("delete from professors where ProfessorId = '$id'");
    }


}