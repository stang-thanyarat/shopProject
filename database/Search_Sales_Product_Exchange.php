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
        $dup = [];
        $res = [];
        foreach ($result as $r) {
            if (!in_array($r['product_id'], $dup)) {
                $r['count'] = 1;
                $res[] = $r;
                $dup[] = $r['product_id'];
            } else {
                $i = array_search($r['product_id'], $dup);
                $res[$i]['count']++;
                $res[$i]['sales_amt'] += $r['sales_amt'];
                $res[$i]['sales_pr'] += $r['sales_pr'];
            }
        }
        $result = $res;
        return $result;
    }


    public function searchsales($keyword)
    {
        $like = "%$keyword%";
        $sql = "SELECT SAD.*,P.* FROM sales_details_tb SAD,product_tb P WHERE SAD.product_id = P.product_id AND SAD.sales_list_id like ?";
        $sql .= ' ORDER BY SAD.sales_dt DESC' ;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $dup = [];
        $res = [];
        foreach ($result as $r) {
            if (!in_array($r['product_id'], $dup)) {
                $r['count']=1;
                $res[] = $r;
                $dup[] = $r['product_id'];
            }else{
                $i = array_search($r['product_id'], $dup);
                $res[$i]['count']++;
                $res[$i]['sales_amt'] += $r['sales_amt'];
                $res[$i]['sales_pr'] += $r['sales_pr'];
            }
        }
        $result = $res;
        return $result;
    }
}