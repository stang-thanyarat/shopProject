<?php
include_once("Connection.php");
include_once("Product.php");

class Category
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM category_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM category_tb WHERE category_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }


    public function getCount($id, $on)
    {
        $products = new Product();
        $products = $products->fetchByCategoryId($id);
        $counts = 0;
        if ($on) {
            foreach ($products as $product) {
                if (intval($product['sales_status']) === 1) {
                    $counts++;
                }
            }
        } else {
            foreach ($products as $product) {
                $counts++;
            }
        }
        return $counts;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM category_tb WHERE category_id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO category_tb (category_name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['category_name'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE category_tb
        SET category_name = ?
        WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['category_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['category_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>