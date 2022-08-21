<?php
include_once("Connection.php");
class Product
{
    private $conn;
    function __construct()
    {
        $this->conn = Connection();
    }
    public function fetchAll()
    {
        $sql = "SELECT * FROM product_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchAddCategory(){
        
        $sql = "SELECT * FROM product_tb LEFT JOIN category_tb ON product_tb.category_id =category_tb.category_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function updateStatus($status,$id){
        $sql = "UPDATE product_tb SET sales_status = ? WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $status, PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM product_tb WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function countCategoryId($id, $on)
    {
        $sql = "SELECT * FROM product_tb WHERE category_id=?";
        if ($on) {
            $sql .= " AND sales_status=1";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }

    public function fetchByCategoryId($id)
    {
        $sql = "SELECT * FROM product_tb LEFT JOIN category_tb ON product_tb.category_id =category_tb.category_id WHERE category_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function search($keyword, $id = null)
    {
        $like = "%".$keyword."%";
        $sql = "SELECT * FROM product_tb LEFT JOIN category_tb ON product_tb.category_id = category_tb.category_id
        WHERE product_name LIKE ?";
        if (!is_null($id)) {
            $sql .= " AND category_id=?";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like , PDO::PARAM_STR);
        if (!is_null($id)) {
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM product_tb WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO product_tb (product_name, category_id, brand, model, sell_id, product_detail, product_img, product_detail_img, product_dlt_unit, product_unit, price, cost_price, notification_amt, sales_status/*, product_rm_unit, product_exchange_id*/) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?/*,?,?*/)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['brand'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['model'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['seller_id'], PDO::PARAM_INT);
        $stmt->bindParam(6, $data['product_detail'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['product_img1'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['product_img2'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['product_dlt_unit'], PDO::PARAM_INT);
        $stmt->bindParam(10, $data['product_unit'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['cost_price'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['notification_amt'], PDO::PARAM_INT);
        $stmt->bindParam(14, $data['sales_status'], PDO::PARAM_INT); //Boolean ใช้ INT
        //$stmt->bindParam(15, $data['product_rm_unit'], PDO::PARAM_INT);
        //$stmt->bindParam(15, $data['product_exchange_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE product_tb
        SET product_name = ?, category_id = ?, brand = ?, model = ?, sell_id = ?, product_detail = ?, product_img = ?, product_detail_img = ?, product_dlt_unit = ?, product_unit = ?, price = ?, cost_price = ?, notification_amt = ?, sales_status = ?/*, product_rm_unit = ?, product_exchange_id = ?*/
        WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['brand'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['model'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['seller_id'], PDO::PARAM_INT);
        $stmt->bindParam(6, $data['product_detail'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['product_img1'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['product_img2'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['product_dlt_unit'], PDO::PARAM_INT);
        $stmt->bindParam(10, $data['product_unit'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['cost_price'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['notification_amt'], PDO::PARAM_INT);
        $stmt->bindParam(14, $data['sales_status'], PDO::PARAM_INT); //Boolean ใช้ INT
        //$stmt->bindParam(15, $data['product_rm_unit'], PDO::PARAM_INT);
        //$stmt->bindParam(16, $data['product_exchange_id'], PDO::PARAM_INT);
        $stmt->bindParam(17, $data['product_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
