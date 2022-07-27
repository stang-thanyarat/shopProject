<?php
include("Connection.php");
Class ProductExchange
{
    private $conn;
    function __construct()
    {
        $this->conn = Connection();
    }
    public function fetchAll()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM productexchange WHERE product_exchange_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM productexchange WHERE product_exchange_id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO productexchange (product_name, category_id, brand, model, sell_id, img, product_detail, product_img, product_detail_img, product_dlt_unit, product_unit, price, cost_price, notification_amt, sales_status, product_rm_unit, product_exchange_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['category_id'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['brand'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['model'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['sell_id'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['product_detail'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['product_img'], PDO::PARAM_INT);
        $stmt->bindParam(8, $data['product_detail_img'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['product_dlt_unit'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['product_unit'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['cost_price'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['notification_amt'], PDO::PARAM_STR);
        $stmt->bindParam(14, $data['sales_status'], PDO::PARAM_STR);
        $stmt->bindParam(15, $data['product_rm_unit'], PDO::PARAM_INT);
        $stmt->bindParam(16, $data['product_exchange_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE productexchange
        SET product_name = ?, category_id = ?, brand = ?, model = ?, sell_id = ?, product_detail = ?, product_img = ?, product_detail_img = ?, product_dlt_unit = ?, product_unit = ?, price = ?, cost_price = ?, notification_amt = ?, sales_status = ?, product_rm_unit = ?, product_exchange_id = ?
        WHERE product_exchange_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['category_id'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['brand'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['model'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['sell_id'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['product_detail'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['product_img'], PDO::PARAM_INT);
        $stmt->bindParam(8, $data['product_detail_img'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['product_dlt_unit'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['product_unit'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['cost_price'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['notification_amt'], PDO::PARAM_STR);
        $stmt->bindParam(14, $data['sales_status'], PDO::PARAM_STR);
        $stmt->bindParam(15, $data['product_rm_unit'], PDO::PARAM_INT);
        $stmt->bindParam(16, $data['product_exchange_id'], PDO::PARAM_INT);
        $stmt->bindParam(17, $data['product_exchange_id'], PDO::PARAM_STR);
        $stmt->execute();
    }
}
