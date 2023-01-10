<?php
include_once ("Connection.php");

Class OrderDetails{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT O.*,OD.*,P.*,S.* FROM order_tb O,order_details_tb OD,product_tb P,stock_tb S WHERE O.order_id = OD.unique_id = P.product_id = S.stock_id ORDER BY S.exp_date DESC";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchAllDate($date)
    {
        $sql = "SELECT O.*,OD.*,P.*,S.* FROM order_tb O,order_details_tb OD,product_tb P,stock_tb S WHERE O.order_id = OD.unique_id = P.product_id = S.stock_id AND S.exp_date = ? ORDER BY S.exp_date DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $date, PDO::PARAM_STR);
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
                $res[$i]['all_amount'] += $r['all_amount'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchAllCondition($date,$id,$keyword){
        $sql = "SELECT O.*,OD.*,P.*,S.* FROM order_tb O,order_details_tb OD,product_tb P,stock_tb S WHERE O.order_id = OD.unique_id = P.product_id = S.stock_id  AND P.category_id = ?
                AND S.exp_date = ? AND P.product_name LIKE ? ORDER BY S.exp_date DESC   ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $date, PDO::PARAM_STR);
        $like = "%" . $keyword . "%";
        $stmt->bindParam(3, $like, PDO::PARAM_STR);
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
                $res[$i]['all_amount'] += $r['all_amount'];
            }
        }
        $result = $res;
        return $result;
    }

    public function searchsales($keyword, $id = null)
    {
        $like = "%$keyword%";
        if (is_null($id)) {
            $sql = "SELECT O.*,OD.*,P.*,S.* FROM order_tb O,order_details_tb OD,product_tb P,stock_tb S WHERE O.order_id = OD.unique_id = P.product_id = S.stock_id  AND product_name LIKE ?";

        } else {
            $sql = "SELECT O.*,OD.*,P.*,S.* FROM order_tb O,order_details_tb OD,product_tb P,stock_tb S WHERE O.order_id = OD.unique_id = P.product_id = S.stock_id AND  P.category_id = ?  AND product_name LIKE ? ";
        }
        $sql .= ' ORDER BY S.exp_date DESC' ;
        $stmt = $this->conn->prepare($sql);
        if (is_null($id)) {
            $stmt->bindParam(1, $like, PDO::PARAM_STR);
        } else {
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->bindParam(2, $like, PDO::PARAM_STR);
        }
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
                $res[$i]['all_amount'] += $r['all_amount'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchAllDateAndKeyword($date,$keyword)
    {
        $sql = "SELECT O.*,OD.*,P.*,S.* FROM order_tb O,order_details_tb OD,product_tb P,stock_tb S WHERE O.order_id = OD.unique_id = P.product_id = S.stock_id  
                AND S.exp_date = ? AND P.product_name LIKE ? ORDER BY S.exp_date DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $date, PDO::PARAM_STR);
        $like = "%" . $keyword . "%";
        $stmt->bindParam(2, $like, PDO::PARAM_STR);
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
                $res[$i]['all_amount'] += $r['all_amount'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchAllDateAndId($date,$id)
    {
        $sql = "SELECT O.*,OD.*,P.*,S.* FROM order_tb O,order_details_tb OD,product_tb P,stock_tb S WHERE O.order_id = OD.unique_id = P.product_id = S.stock_id AND  P.category_id = ?
                AND S.exp_date = ? ORDER BY S.exp_date DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $date, PDO::PARAM_STR);
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
                $res[$i]['all_amount'] += $r['all_amount'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT O.*,OD.*,P.*,S.* FROM order_tb O,order_details_tb OD,product_tb P,stock_tb S WHERE O.order_id = OD.unique_id = P.product_id = S.stock_id AND P.category_id = ? ORDER BY S.exp_date DESC";
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
                $res[$i]['all_amount'] += $r['all_amount'];
            }
        }
        $result = $res;
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM order_details_tb WHERE unique_id=?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO order_details_tb (order_id, product_id, unitprice, amount, all_amount, listother, priceother, net_price) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['order_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['unitprice'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['amount'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['all_amount'], PDO::PARAM_INT);
        $stmt->bindParam(6, $data['listother'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['priceother'], PDO::PARAM_INT);
        $stmt->bindParam(8, $data['net_price'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE order_details_tb
        SET  order_id = ?, product_id = ?, unitprice = ?, amount = ?, all_amount = ?, listother = ?, priceother = ?, net_price = ?
        WHERE unique_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['order_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['unitprice'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['amount'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['all_amount'], PDO::PARAM_INT);
        $stmt->bindParam(6, $data['listother'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['priceother'], PDO::PARAM_INT);
        $stmt->bindParam(8, $data['net_price'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['unique_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>