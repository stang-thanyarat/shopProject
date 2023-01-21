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
        $sql = "SELECT CP.*,P.product_name FROM costprice_tb CP,product_tb P WHERE CP.product_id = P.product_id  ORDER BY CP.order_dt DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchAllDate($date)
    {
        $sql = "SELECT CP.*,P.product_name FROM costprice_tb CP,product_tb P WHERE CP.product_id = P.product_id  AND CP.order_dt = ? ORDER BY CP.order_dt DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $date, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public function fetchAllDateAndId($date,$id)
    {
        $sql = "SELECT CP.*,P.product_name FROM costprice_tb CP,product_tb P WHERE CP.product_id = P.product_id  AND P.category_id = ?
                AND CP.order_dt = ? ORDER BY CP.order_dt DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $date, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT CP.*,P.product_name FROM costprice_tb CP,product_tb P WHERE CP.product_id = P.product_id  AND P.category_id = ? ORDER BY CP.order_dt DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
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
                $res[$i]['order_dt'] += $r['order_dt'];
            }
        }
        $result = $res;
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