<?php
include_once("Connection.php");

class Search_Category
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM search_ category_tb ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function insert($data)
    {
        $sql = "INSERT INTO search_category_tb(category_id) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['category_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function reset(){
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = 'TRUNCATE TABLE Categories';
        $stmt->execute();
    }
}

