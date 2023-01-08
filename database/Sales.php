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
        $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id ORDER BY SA.sales_dt DESC ";
        $stmt = $this->conn->prepare($sql);
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
        $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id  AND  SA.sales_dt BETWEEN ? AND ? ORDER BY SA.sales_dt DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $start, PDO::PARAM_STR);
        $stmt->bindParam(2, $end, PDO::PARAM_STR);
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

    public function fetchAllDate($date)
    {
        $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id  AND SA.sales_dt = ? ORDER BY SA.sales_dt DESC ";
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
                $res[$i]['sales_amt'] += $r['sales_amt'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchAllCondition($date,$id,$keyword){
        $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id  AND P.category_id = ?
                AND SA.sales_dt = ? AND P.product_name LIKE ? ORDER BY SA.sales_dt DESC   ";
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
                $res[$i]['sales_amt'] += $r['sales_amt'];
            }
        }
        $result = $res;
        return $result;
    }

    public function searchsales($keyword, $id = null)
    {
        $like = "%$keyword%";
        if (is_null($id)) {
            $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id  AND product_name LIKE ?";

        } else {
            $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id AND  P.category_id = ?  AND product_name LIKE ? ";
        }
        $sql .= ' ORDER BY SA.sales_dt DESC' ;
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
                $res[$i]['sales_amt'] += $r['sales_amt'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchAllDateAndKeyword($date,$keyword)
    {
        $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id  
                AND SA.sales_dt = ? AND P.product_name LIKE ? ORDER BY SA.sales_dt DESC ";
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
                $res[$i]['sales_amt'] += $r['sales_amt'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchAllDateAndId($date,$id)
    {
        $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id  AND  P.category_id = ?
                AND SA.sales_dt = ? ORDER BY SA.sales_dt DESC ";
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
                $res[$i]['sales_amt'] += $r['sales_amt'];
            }
        }
        $result = $res;
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE  SA.product_id = P.product_id AND P.category_id = ? ORDER BY SA.sales_dt DESC ";
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

    public function fetchAddCategorysales()
    {
        $data = $this->fetchAll();
        $sumData = [];
        foreach ($data as $row) {
            //กรณีเปิดจะขึ้นสินค้า
            if ($row['sales_status'] == 1 && $row['product_rm_unit'] > 0) {
                $catData = (new Category())->fetchById($row);
                $sumData[] = array_merge($row, $catData);
            }
            //กรณีปิดก็จะปิดสถานะ
            //แต่ถ้าลบ elseif ออก จะเป็นการลบ(ซ่อนสินค้า)ออกไป
            elseif ($row['sales_status'] == 0 && $row['product_rm_unit'] > 0) {
                $catData = (new Category())->fetchById($row);
                $sumData[] = array_merge($row, $catData);
            }
        }
        return $sumData;
    }

    public function fetchByCategoryIdsales($id)
    {
        $sql = "SELECT SA.*,P.* FROM sales_tb SA,product_tb P WHERE P.category_id = ? AND sales_status = 1  AND product_rm_unit > 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $sql = "INSERT INTO sales_tb (product_id, sales_dt, payment_sl, employee_id, price, sales_amt, discount ,price_paid, import_files, note, stock_id)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['sales_dt'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['employee_id'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['sales_amt'], PDO::PARAM_INT);
        $stmt->bindParam(7, $data['discount'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['price_paid'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['import_files'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['note'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['stock_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE sales_tb
        SET product_id = ?, sales_dt = ?, payment_sl = ?, employee_id = ?, price = ?, sales_amt = ?, discount = ?, price_paid = ?, import_files = ?, note = ?, stock_id = ?
        WHERE sales_list_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['sales_dt'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['employee_id'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['sales_amt'], PDO::PARAM_INT);
        $stmt->bindParam(7, $data['discount'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['price_paid'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['import_files'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['note'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['stock_id'], PDO::PARAM_INT);
        $stmt->bindParam(12, $data['sales_list_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>