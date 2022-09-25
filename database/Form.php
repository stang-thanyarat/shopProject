<?php
include_once ("Connection.php");
Class Form{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT * FROM form";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchById($id){
        $sql = "SELECT * FROM form WHERE id=?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt ->fetch();
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM form WHERE id=?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO form (name, sername, gender, birthday, edu, home, img) VALUES (?, ?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['sername'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['gender'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['birthday'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['edu'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['home'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['img'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE form
        SET name = ?, sername = ?, gender = ?, birthday = ?, edu = ?, home = ?, img = ?,
        WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['sername'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['gender'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['birthday'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['edu'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['home'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['img'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>