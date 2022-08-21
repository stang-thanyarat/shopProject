<?php
include ("Connection.php");
Class Sis{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT * FROM sis_tb ";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchById($id){
        $sql = "SELECT * FROM sis_tb WHERE sis_id=?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt ->fetch();
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM sis_tb WHERE sis_id=?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO sis_tb (sis_prefix, sis_name, sis_lastname, sis_status) VALUES (?, ?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['sis_prefix'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['sis_name'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['sis_lastname'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['sis_status'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE sis_tb
        SET sis_prefix = ?, sis_name = ?, sis_lastname = ?, sis_status = ?
        WHERE sis_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['sis_prefix'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['sis_name'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['sis_lastname'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['sis_status'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['sis_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>