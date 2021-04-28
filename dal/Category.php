<?php
require_once 'Connect.php';

class Category extends Connect implements IDal
{
    private $tableName = "category";

    /**
     * Category constructor.
     */
    public function __construct ()
    {
        parent::__construct();
    }

    public function getList ()
    {
        // TODO: Implement getList() method.
        $sql = "SELECT * FROM $this->tableName"; //"SELECT * FROM category";
        $rs = $this->pdo->query($sql);//gọi query để lấy về danh sách bản ghi
        $arr = [];
        while ($row = $rs->fetchObject()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function add ($arr)
    {
        // TODO: Implement add() method.
    }

    public function update ($id, $arr)
    {
        // TODO: Implement update() method.
    }

    public function delete ($id)
    {
        // TODO: Implement delete() method.
    }


}

?>