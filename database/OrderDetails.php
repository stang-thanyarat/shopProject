<?php
include ("Connection.php");
Class OrderDetails{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT * FROM order_details_tb ";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchById($id){
        $sql = "SELECT * FROM order_details_tb WHERE unique_id=?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt ->fetch();
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM order_details_tb WHERE unique_id=?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO order_details_tb (order_id, product_id, unitprice, amount) VALUES (?, ?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['order_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['unitprice'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['amount'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE order_details_tb
        SET order_id = ?, product_id = ?, unitprice = ?, amount = ?
        WHERE unique_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['order_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['unitprice'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['amount'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['unique_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>