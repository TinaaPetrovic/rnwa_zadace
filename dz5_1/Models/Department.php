<?php


class Department
{
    public $id;
    public $name;

    /**
     * Department constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }


    public static function all() {
        $list = [];
        $req = Database::query("SELECT * from departaments");
        foreach($req as $dep) {
            $list[] = new Department($dep['DepartamentId'], $dep['Name']);
        }
        return $list;
    }

    public static function find($pid) {
        $pid = intval($pid);
        $req = Database::query("SELECT * from departaments where DepartamentId = $pid");
        $dep = $req[0];
        return new Department($dep['DepartamentId'], $dep['Name']);
    }

    public static function save($name)
    {
        return Database::query("insert into departaments (Name,Faculties_FacultyId) values ('$name',1)");
    }

    public static function update($gid,$name)
    {
       return Database::query("update departaments set Name = '$name' where DepartamentId = $gid");
    }

    public static function delete($gid)
    {
        Database::query("delete from departaments where DepartamentId = '$gid'");
    }


}