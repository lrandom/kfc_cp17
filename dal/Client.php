<?php
require_once 'Connect.php';
require_once 'IDal.php';

class Clients extends Connect implements IDal
{
    private $tableName = "clients";
    private $perPage = 10;

    /**
     * Category constructor.
     */
    public function __construct ()
    {
        parent::__construct();
    }

    public function getList ($page)
    {
        $offset = $page*10 - 10;
        // TODO: Implement getList() method.
        $sql = "SELECT *FROM $this->tableName  LIMIT $offset,$this->perPage"; //"SELECT * FROM category";
        $rs = $this->pdo->query($sql);//gọi query để lấy về danh sách bản ghi
        $arr = [];
        while ($row = $rs->fetchObject()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function add ($arr)
    {
        //var_dump($arr);
        try {
            // TODO: Implement add() method.
            $sql = "INSERT INTO $this->tableName(full_name,email,password) VALUES(:full_name,:email,:password)";
            //var_dump($sql);
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':full_name',$full_name);
            $stm->bindParam(':email', $email);
            $stm->bindParam(':password', $password);
            $full_name = $arr['full_name'];
            $email = $arr['email'];
            $password = $arr['password'];
            //var_dump($name);
            $stm->execute();
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function update ($idx, $arr)
    {
        // TODO: Implement update() method.
        try {
            // TODO: Implement add() method.
            $sql = "UPDATE $this->tableName SET full_name=:full_name, email=:email, password=:password  WHERE id=:id";
            //var_dump($sql);
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':full_name', $full_name);
            $stm->bindParam(':email', $email);
            $stm->bindParam(':password', $password);
            $stm->bindParam(':id', $id);
            $full_name = $arr['full_name'];
            $email = $arr['email'];
            $password = $arr['password'];
            $id = $idx;
            $stm->execute();

          /*  $sql = 'UPDATE '.$this->tableName.' SET fULL_name="'.$arr['full_name'].'",email='.$arr['email'].', password='.$arr['password'].'level='.$arr['level'].'  WHERE id='.$idx;
            $this->pdo->query($sql);*/
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function delete ($id)
    {
        // TODO: Implement delete() method.
        $this->pdo->query("DELETE from $this->tableName where id=$id");
    }

    public function getById ($id)
    {
        // TODO: Implement getById() method.
        $sql = "SELECT * FROM $this->tableName where id=$id";
        $rs = $this->pdo->query($sql);
        return $rs->fetchObject(); //trả về một đối tượng dựa theo id
    }

    public function getTotalPage ()
    {
        // TODO: Implement getTotalPage() method.
        $sql = "SELECT count(*) as total_row FROM $this->tableName";
        $rs = $this->pdo->query($sql);
        $result = $rs->fetchObject();
        return round($result->total_row/$this->perPage);
    }


}

?>