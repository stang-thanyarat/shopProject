<?php
include_once("Connection.php");

class Search_Sales_Product_Exchange
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT SAD.*,P.* FROM sales_details_tb SAD,product_tb P WHERE SAD.product_id = P.product_id ORDER BY SAD.sales_amt DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    public function searchsales($keyword)
    {
        $like = "%$keyword%";
        $sql = "SELECT SAD.*,P.* FROM sales_details_tb SAD,product_tb P WHERE SAD.product_id = P.product_id AND SAD.sales_list_id like ? ";
        $sql .= ' ORDER BY SAD.sales_amt DESC' ;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}