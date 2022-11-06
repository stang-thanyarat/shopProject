<?php

include_once("Connection.php");

class Search
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM search_tb ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function insert($data)
    {
        $sql = "INSERT INTO search_tb (keyword) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['keyword'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function reset(){
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = 'TRUNCATE TABLE search_tb';
        $stmt->execute();
    }
}

?>