<?php
include_once("Connection.php");

class Budget
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT P.*,SA.*,O.* FROM product_tb P,sales_tb SA,order_tb O WHERE P.product_id = SA.sales_list_id = O.order_id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

   /* public function fetchAll($all_price_odr,$all_price,$price)
    {
        $sql = "SELECT SUM(all_price_odr) FROM order_tb; SELECT SUM(all_price) FROM sales_tb; SELECT SUM(price) FROM product_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $all_price_odr, PDO::PARAM_STR);
        $stmt->bindParam(2, $all_price, PDO::PARAM_STR);
        $stmt->bindParam(3, $price, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchAll($all_price_odr,$all_price,$price)
    {
        $sql = "SELECT SUM(all_price_odr) FROM order_tb; SELECT SUM(all_price) FROM sales_tb; SELECT SUM(price) FROM product_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $all_price_odr, PDO::PARAM_STR);
        $stmt->bindParam(2, $all_price, PDO::PARAM_STR);
        $stmt->bindParam(3, $price, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
   */
    function fetchBetween($firstdate,$lastdate)
{
    $sql = "SELECT P.*,SA.*,O.* FROM product_tb P,sales_tb SA,order_tb O WHERE P.product_id = SA.sales_list_id = O.order_id AND SAD.sales_dt BETWEEN ? AND ? ORDER BY SAD.sales_dt DESC ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(1, $firstdate, PDO::PARAM_STR);
    $stmt->bindParam(2, $lastdate, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

}
?>