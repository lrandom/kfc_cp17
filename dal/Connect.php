<?php

class Connect
{
    private $dbHost = 'localhost';
    private $dbName = 'shop_cp17';
    private $dbUser = 'root';
    private $dbPass = 'koodinh';
    protected $pdo = null;


    //kết nối đến CSDL sử dụng PDO

    /**
     * Connect constructor.
     */
    public function __construct ()
    {
        $this->getConnect();
    }

    public function getConnect ()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
            $this->pdo->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo 'Lỗi kết nối CSDL';
        }
    }

    public function getPDO ()
    {
        return $this->pdo;
    }

    public function closeConnect ()
    {
        $this->pdo = null;
    }

    public function __destruct ()
    {
        // TODO: Implement __destruct() method.
        $this->closeConnect();
    }


}

?>