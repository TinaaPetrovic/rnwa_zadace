<?php


class Title
{
    public $id;
    public $type;

    /**
     * Title constructor.
     * @param $id
     * @param $type
     */
    public function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }


    public static function all() {
        $list = [];
        $req = Database::query("SELECT * from titles");
        foreach($req as $title) {
            $list[] = new Title($title['TitleId'], $title['Type']);
        }
        return $list;
    }

    public static function find($id) {
        $id = intval($id);
        $req = Database::query("SELECT * from titles where TitleId = $id");
        $title = $req[0];
        return new Title($title['TitleId'], $title['Type']);
    }

    public static function save($type)
    {
        return Database::query("insert into titles (Type) values ('$type')");
    }

    public static function update($id, $type)
    {
        return Database::query("update titles set Type = '$type' where TitleId = '$id'");
    }

    public static function delete($id)
    {
        return Database::query("delete from titles where TitleId = '$id'");
    }


}