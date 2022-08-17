<?php
include("Connection.php");
class ProductExchange
{
    private $conn;
    function __construct()
    {
        $this->conn = Connection();
    }
    public function fetchAll()
    {
        $sql = "SELECT * FROM product_exchange_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM product_exchange_tb WHERE product_exchange_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM product_exchange_tb WHERE product_exchange_id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    //เปลี่ยนชนิดข้อมูล INT หรือ STR
    public function insert($data)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO product_exchange_tb (/*product_id, customer_id, exchange_date, */damage_proof, note,/* exchange_time, */exchange_amount, exchange_status/*, exchange_period*/) VALUES (/*?,?,?,?,?,*/?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        /*$stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);*/
        /*$stmt->bindParam(2, $data['customer_id'], PDO::PARAM_INT);*/
        /*$stmt->bindParam(3, $data['exchange_date'], PDO::PARAM_STR);*/
        $stmt->bindParam(1, $data['damage_proof'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['note'], PDO::PARAM_STR);
        /*$stmt->bindParam(6, $data['exchange_time'], PDO::PARAM_STR);*/
        $stmt->bindParam(3, $data['exchange_amount'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['exchange_status'], PDO::PARAM_INT);
        /*$stmt->bindParam(9, $data['exchange_period'], PDO::PARAM_STR);*/
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE product_exchange_tb
        SET /*product_id = ?, customer_id = ?, exchange_date = ?, */damage_proof = ?, note = ?, /*exchange_time = ?, */exchange_amount = ?, exchange_status = ?/*, exchange_period = ?*/
        WHERE product_exchange_id = ?";
        $stmt = $this->conn->prepare($sql);
        /*$stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);*/
        /*$stmt->bindParam(2, $data['customer_id'], PDO::PARAM_INT);*/
        /*$stmt->bindParam(3, $data['exchange_date'], PDO::PARAM_STR);*/
        $stmt->bindParam(1, $data['damage_proof'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['note'], PDO::PARAM_STR);
        /*$stmt->bindParam(6, $data['exchange_time'], PDO::PARAM_STR);*/
        $stmt->bindParam(3, $data['exchange_amount'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['exchange_status'], PDO::PARAM_INT);
        /*$stmt->bindParam(9, $data['exchange_period'], PDO::PARAM_STR);*/
        $stmt->bindParam(5, $data['product_exchange_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
