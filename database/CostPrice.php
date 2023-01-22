<?php
include_once("Connection.php");

class CostPrice
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT CP.*,P.product_name,P.brand,C.category_name FROM costprice_tb CP,product_tb P,category_tb C WHERE CP.product_id = P.product_id = C.category_id  ORDER BY CP.order_dt DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT CP.*,P.product_name,P.brand,C.category_name FROM costprice_tb CP,product_tb P,category_tb C WHERE CP.category_id = C.category_id = P.product_id AND CP.product_id = ? ORDER BY CP.order_dt DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetchBetween($start,$end)
    {
        $sql = "SELECT CP.*,P.product_name FROM costprice_tb CP,product_tb P WHERE CP.product_id = P.product_id AND CP.order_dt BETWEEN ? AND ? ORDER BY CP.order_dt DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $start, PDO::PARAM_STR);
        $stmt->bindParam(2, $end, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}

?>