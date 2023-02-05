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
    }

    public function AllBG1()
    {
        $data2 = $this->fetchAll2();
        $Allprice = 0;
        foreach ($data2 as $rowss) {
            $Allprice += $rowss['all_price'];
        }
        return $Allprice;
    }


    public function AllBG2()
    {

        $data3 = $this->fetchAll3();
        $Allprice = 0;
        foreach ($data3 as $rowsss) {
            $Allprice += $rowsss['all_price_odr'];
        }
        return  $Allprice;
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
    function fetchBetween($firstdate=null, $lastdate=null)
    {
        if(is_null($firstdate)){
            $firstdate = date('Y-m-d');
        }
        if(is_null($lastdate)){
            $lastdate = date('Y-m-d');
        }
        $sql = "SELECT P.*,SA.*,O.* ,O.payment_sl as payment_sl_order FROM product_tb P,sales_tb SA,order_tb O WHERE P.product_id = SA.sales_list_id = O.order_id AND SA.payment_dt BETWEEN ? AND ? OR O.payment_dt BETWEEN ? AND ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $firstdate, PDO::PARAM_STR);
        $stmt->bindParam(2, $lastdate, PDO::PARAM_STR);
        $stmt->bindParam(3, $firstdate, PDO::PARAM_STR);
        $stmt->bindParam(4, $lastdate, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $Allprice1 = 0;
        foreach ($result as $rows) {
            $Allprice1 += $rows['price'];
        }
        $Allprice2 = 0;
        foreach ($result as $rowss) {
            $Allprice2 += $rowss['all_price'];
        }
        $Allprice3 = 0;
        foreach ($result as $rowsss) {
            $Allprice3 += $rowsss['all_price_odr'];
        }
        $credit = 0;
        foreach ($result as $rowsss) {
            if($rowsss['payment_sl_order']=='เครดิต'){
                 $credit += $rowsss['all_price_odr'];
            }
        }
        $cash = 0;
        foreach ($result as $rowsss) {
            if($rowsss['payment_sl_order']=='เงินสด'){
                 $cash += $rowsss['all_price_odr'];
            }
        }
        $object = new stdClass();
        $object->BG1 = $Allprice1;
        $object->BG2 = $Allprice2;
        $object->BG3 = $Allprice3;
        $object->credit = $credit;
        $object->cash = $cash;
        $object->result = $result;
        return $object;
    }
}
