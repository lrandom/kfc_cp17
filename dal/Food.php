<?php
require_once 'Connect.php';
require_once 'IDal.php';

class Food extends Connect implements IDal
{
    private $tableName = "foods";
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
        $sql = "SELECT *,foods.name as name,foods.id as id, 
              category.name as category_name
            FROM $this->tableName 
            INNER JOIN category ON foods.category_id = category.id    
                LIMIT $offset,$this->perPage"; //"SELECT * FROM category";
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
            $sql = "INSERT INTO $this->tableName(name,price,category_id) VALUES(:name,:price,:category_id)";
            //var_dump($sql);
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':price', $price);
            $stm->bindParam(':category_id', $category_id);
            $name = $arr['name'];
            $price = $arr['price'];
            $category_id = $arr['category_id'];
            //var_dump($name);
            $stm->execute();
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function addWithImage ($arr, $imagePath)
    {
        //var_dump($arr);
        try {
            // TODO: Implement add() method.
            $sql = "INSERT INTO $this->tableName(name,price,category_id,image_path) 
VALUES(:name,:price,:category_id,:image_path)";
            //var_dump($sql);
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':price', $price);
            $stm->bindParam(':category_id', $category_id);
            $stm->bindParam(':image_path', $image_path);
            $name = $arr['name'];
            $price = $arr['price'];
            $category_id = $arr['category_id'];
            $image_path = $imagePath;
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
            /*$sql = "UPDATE $this->tableName SET name=:name,
                 price=:price, 
                 category_id=:category_id  WHERE id=:id";
            //var_dump($sql);
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':price', $price);
            $stm->bindParam(':category_id', $category_id);
            $stm->bindParam(':id', $id);

            $name = $arr['name'];
            $price = $arr['price'];
            $category_id = $arr['category_id'];
            $id = $idx;
            $stm->execute();*/

            $sql = 'UPDATE '.$this->tableName.' SET name="'.$arr['name'].'",
                 price='.$arr['price'].', 
                 category_id='.$arr['category_id'].'  WHERE id='.$idx;
            $this->pdo->query($sql);
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