<?php
include_once("Connection.php");
include_once("Product.php");
include_once("Category.php");
include_once("Sales.php");


class Sales
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT SA.*,SAD.*,P.* FROM sales_tb SA,sales_details_tb SAD,product_tb P WHERE SA.sales_list_id = SAD.sales_list_id = P.product_id ORDER BY SAD.sales_list_id DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $dup = [];
        $res = [];
        foreach ($result as $r) {
            if (!in_array($r['sales_list_id'], $dup)) {
                $r['count']=1;
                $res[] = $r;
                $dup[] = $r['sales_list_id'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT SA.*,SAD.*,P.* FROM sales_tb SA,sales_details_tb SAD,product_tb P WHERE SA.sales_list_id = SAD.sales_list_id = P.product_id ORDER BY SAD.sales_list_id DESC";
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
                $res[$i]['sales_amt'] += $r['sales_amt'];
            }
        }
        $result = $res;
        return $result;
    }


    public function fetchBetween($start,$end)
    {
        $sql = "SELECT SA.*,SAD.*,P.* FROM sales_tb SA,sales_details_tb SAD,product_tb P WHERE SA.sales_list_id = SAD.sales_list_id = P.product_id AND SAD.sales_dt BETWEEN ? AND ? ORDER BY SAD.sales_dt DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $start, PDO::PARAM_STR);
        $stmt->bindParam(2, $end, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $dup = [];
        $res = [];
        foreach ($result as $r) {
            if (!in_array($r['sales_list_id'], $dup)) {
                $r['count']=1;
                $res[] = $r;
                $dup[] = $r['sales_list_id'];
            }
        }
        $result = $res;
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM sales_tb WHERE sales_list_id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO sales_tb (payment_sl ,all_price ,all_quantity, employee_id,import_files,note)
        VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['all_price'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['all_quantity'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['employee_id'], PDO::PARAM_INT);
        //$stmt->bindParam(5, $data['discount'], PDO::PARAM_STR);
        //$stmt->bindParam(6, $data['sales_amt'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['import_files'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['note'], PDO::PARAM_STR);
        //$stmt->bindParam(11, $data['stock_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE sales_tb
        SET product_id = ?, sales_dt = ?, payment_sl = ?, employee_id = ?, discount = ?, sales_amt = ?, all_quantity = ?, all_price = ?, import_files = ?, note = ?, stock_id = ?
        WHERE sales_list_id = ?";
        $stmt = $this->conn->prepare($sql);
        //$stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);
        //$stmt->bindParam(2, $data['sales_dt'], PDO::PARAM_STR);
        //$stmt->bindParam(3, $data['payment_sl'], PDO::PARAM_STR);
        //$stmt->bindParam(4, $data['employee_id'], PDO::PARAM_INT);
        //$stmt->bindParam(5, $data['discount'], PDO::PARAM_STR);
        //$stmt->bindParam(6, $data['sales_amt'], PDO::PARAM_INT);
        $stmt->bindParam(7, $data['all_quantity'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['all_price'], PDO::PARAM_STR);
        //$stmt->bindParam(9, $data['import_files'], PDO::PARAM_STR);
        //$stmt->bindParam(10, $data['note'], PDO::PARAM_STR);
        //$stmt->bindParam(11, $data['stock_id'], PDO::PARAM_INT);
        $stmt->bindParam(12, $data['sales_list_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>