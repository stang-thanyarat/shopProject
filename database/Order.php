<?php
include_once("Connection.php");
class Order
{
    private $conn;
    function __construct()
    {
        $this->conn = Connection();
    }
    public function fetchAll()
    {
        try {
            $sql = "SELECT O.*,S.sell_name FROM order_tb O,sell_tb S WHERE O.sell_id = S.sell_id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function search($keyword)
    {
        try {
            $like = "%$keyword%";
            $sql = "SELECT * FROM order_tb WHERE sell_name LIKE ? ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $like, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function fetchById($id)
    {
        try {
            $sql = "SELECT O.*,S.sell_name FROM order_tb O,sell_tb S WHERE O.sell_id = S.sell_id AND order_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM order_tb WHERE order_id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO order_tb (datebill, datereceive, sell_id, payment_sl, payment_dt, note, bank_slip, 
        receipt, delivery_notice, net_price, order_status) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['datebill'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['datereceive'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['sell_id'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['payment_dt'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['note'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['bank_slip'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['receipt'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['delivery_notice'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['net_price'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['order_status'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE order_tb
        SET datebill = ?, datereceive = ?, sell_id = ?, payment_sl = ?, payment_dt = ?, note = ?, bank_slip = ?, 
        receipt = ? , delivery_notice = ?, net_price = ?, order_status= ?
        WHERE order_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['datebill'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['datereceive'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['sell_id'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['payment_dt'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['note'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['bank_slip'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['receipt'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['delivery_notice'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['net_price'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['order_status'], PDO::PARAM_INT);
        $stmt->bindParam(12, $data['order_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
