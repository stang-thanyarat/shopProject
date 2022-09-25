<?php
include_once("Connection.php");
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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM product_exchange_tb WHERE product_exchange_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
        if (!isset($_SESSION)) {
            session_start();
        }
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO product_exchange_tb
                (product_id, 
                 damage_proof, 
                 note, 
                 exchange_amount, 
                 exchange_status ";
        if ($data['exchange_status'] == '0') {
            $day_change = !isset($_SESSION['day_change']) ? 7 : $_SESSION['day_change'];
            $sql .= ' ,exchange_period,exchange_name,exchange_tel) VALUES (?,?,?,?,?, DATE_ADD(CURRENT_TIMESTAMP(), INTERVAL ? DAY),?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);
            $stmt->bindParam(2, $data['damage_proof'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['note'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['exchange_amount'], PDO::PARAM_INT);
            $stmt->bindParam(5, $data['exchange_status'], PDO::PARAM_INT);
            $stmt->bindParam(6, $day_change, PDO::PARAM_INT);
            $stmt->bindParam(7, $data['exchange_name'], PDO::PARAM_STR);
            $stmt->bindParam(8, $data['exchange_tel'], PDO::PARAM_STR);
            $stmt->execute();
        } else {
            $sql .= ") VALUES (?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);
            $stmt->bindParam(2, $data['damage_proof'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['note'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['exchange_amount'], PDO::PARAM_INT);
            $stmt->bindParam(5, $data['exchange_status'], PDO::PARAM_INT);
            $stmt->execute();
        }

    }

    public function update($data)
    {
        $sql = "UPDATE product_exchange_tb
        SET product_id = ?,/* customer_id = ?, exchange_date = ?, */damage_proof = ?, note = ?, /*exchange_time = ?, */exchange_amount = ?, exchange_status = ?, exchange_name = ?, exchange_tel = ?/*, exchange_period = ?*/
        WHERE product_exchange_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);
        /*$stmt->bindParam(2, $data['customer_id'], PDO::PARAM_INT);*/
        $stmt->bindParam(3, $data['exchange_date'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['damage_proof'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['note'], PDO::PARAM_STR);
        /*$stmt->bindParam(6, $data['exchange_time'], PDO::PARAM_STR);*/
        $stmt->bindParam(4, $data['exchange_amount'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['exchange_status'], PDO::PARAM_INT);
        /*$stmt->bindParam(9, $data['exchange_period'], PDO::PARAM_STR);*/
        $stmt->bindParam(6, $data['exchange_name'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['exchange_tel'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['product_exchange_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
