<?php
include_once("Connection.php");
include_once("Product.php");

class Stock
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM stock_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll( PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM stock_tb WHERE stock_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch( PDO::FETCH_ASSOC);
        return $result;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM stock_tb WHERE stock_id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO stock_tb (order_id, product_id, exp_date, amount) 
        VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['order_id'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['exp_date'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['amount'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE stock_tb
        SET order_id = ?, product_id = ?, exp_date = ?, amount = ?
        WHERE stock_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['order_id'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['exp_date'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['amount'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['stock_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>