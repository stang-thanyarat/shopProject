<?php
include_once("Connection.php");

class Budget
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll1()
    {
        $sql = "SELECT * FROM product_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchAll2()
    {
        $sql = "SELECT * FROM sales_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchAll3()
    {
        $sql = "SELECT * FROM order_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

     public function AllBG()
    {
        $data1 = $this->fetchAll1();
        $Allprice = 0;
        foreach ($data1 as $rows) {
            $Allprice += $rows['price'];
        }
        return $Allprice;

        $data2 = $this->fetchAll2();
        $sumData2 = [];
        foreach ($data2 as $rowss) {

        }
        return $sumData2;

        $data3 = $this->fetchAll3();
        $sumData3 = [];
        foreach ($data3 as $rowsss) {

        }
        return $sumData3;
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