<?php
include_once ("Connection.php");
include_once ("Contract.php");
Class Customer{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT * FROM customer_tb ";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchById($id){
        $sql = "SELECT * FROM customer_tb WHERE customer_id=?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt ->fetch();
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM customer_tb WHERE customer_id=?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO customer_tb (customer_prefix, customer_name, customer_lastname, customer_address, customer_img, customer_telephone, customer_card_id) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['customer_prefix'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['customer_name'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['customer_lastname'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['customer_address'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['customer_img'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['customer_telephone'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['customer_card_id'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE customer_tb
        SET customer_prefix = ?, customer_name = ?, customer_lastname = ?, customer_address = ?, customer_img = ?, customer_telephone = ?, customer_card_id = ?
        WHERE customer_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['customer_prefix'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['customer_name'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['customer_lastname'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['customer_address'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['customer_img'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['customer_telephone'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['customer_card_id'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['customer_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>