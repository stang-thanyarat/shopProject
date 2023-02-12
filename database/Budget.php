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
        try {
            $sql = "SELECT * FROM product_tb";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (!$result) {
                return [];
            } else {
                return $result;
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }


    public function fetchAll2()
    {
        try {
            $sql = "SELECT * FROM sales_tb";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (!$result) {
                return [];
            } else {
                return $result;
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function fetchAll3()
    {
        try {
            $sql = "SELECT * FROM order_tb";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (!$result) {
                return [];
            } else {
                if (!$result) {
                    return [];
                } else {
                    return $result;
                }
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function AllBG()
    {
        try{
            $data1 = $this->fetchAll1();
            $Allprice = 0;
            foreach ($data1 as $rows) {
                $Allprice += $rows['price'];
            }
            return $Allprice;
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function AllBG1()
    {
        try{
            $data2 = $this->fetchAll2();
            $Allprice = 0;
            foreach ($data2 as $rowss) {
                $Allprice += $rowss['all_price'];
            }
            return $Allprice;
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }


    public function fetchBetweenSales($firstdate = null, $lastdate = null)
    {
        try {
            if (is_null($firstdate)) {
                $firstdate = date('Y-m-d');
            }
            if (is_null($lastdate)) {
                $lastdate = date('Y-m-d');
            }
            $sql = "SELECT * FROM sales_tb SA WHERE sales_list_id AND SA.payment_dt BETWEEN ? AND ? OR SA.payment_dt BETWEEN ? AND ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $firstdate, PDO::PARAM_STR);
            $stmt->bindParam(2, $lastdate, PDO::PARAM_STR);
            $stmt->bindParam(3, $firstdate, PDO::PARAM_STR);
            $stmt->bindParam(4, $lastdate, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (!$result) {
                return [];
            } else {
                if (!$result) {
                    return [];
                } else {
                    return $result;
                }
            }
            $Allprice2 = 0;
            foreach ($result as $rowss) {
                $Allprice2 += $rowss['all_price'];
            }
            $credit = 0;
            foreach ($result as $rowsss) {
                if ($rowsss['payment_sl_order'] == 'เครดิต') {
                    $credit += $rowsss['all_price_odr'];
                }
            }
            $cash = 0;
            foreach ($result as $rowsss) {
                if ($rowsss['payment_sl_order'] == 'เงินสด') {
                    $cash += $rowsss['all_price_odr'];
                }
                $object = new stdClass();
                $object->BG2 = $Allprice2;
                $object->result = $result;
                return $object;
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function fetchBetweenOrder($firstdate = null, $lastdate = null)
    {
        try {
            if (is_null($firstdate)) {
                $firstdate = date('Y-m-d');
            }
            if (is_null($lastdate)) {
                $lastdate = date('Y-m-d');
            }
            $sql = "SELECT O.*,O.payment_sl as payment_sl_order FROM order_tb O WHERE O.payment_dt BETWEEN ? AND ? OR O.payment_dt BETWEEN ? AND ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $firstdate, PDO::PARAM_STR);
            $stmt->bindParam(2, $lastdate, PDO::PARAM_STR);
            $stmt->bindParam(3, $firstdate, PDO::PARAM_STR);
            $stmt->bindParam(4, $lastdate, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $Allprice3 = 0;
            foreach ($result as $rowsss) {
                $Allprice3 += $rowsss['all_price_odr'];
            }
            $credit = 0;
            foreach ($result as $rowsss) {
                if ($rowsss['payment_sl_order'] == 'เครดิต') {
                    $credit += $rowsss['all_price_odr'];
                }
            }
            $cash = 0;
            foreach ($result as $rowsss) {
                if ($rowsss['payment_sl_order'] == 'เงินสด') {
                    $cash += $rowsss['all_price_odr'];
                }
            }
            $complete = 0;
            foreach ($result as $rowsss) {
                if ($rowsss['order_status'] == 0) {
                    $complete += $rowsss['all_price_odr'];
                }
            }
            $object = new stdClass();
            $object->BG3 = $Allprice3;
            $object->credit = $credit;
            $object->cash = $cash;
            $object->complete = $complete;
            $object->result = $result;
            return $object;
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }

    }


    function fetchBetweenProduct()
    {
        try {
            $sql = "SELECT * FROM product_tb";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (!$result) {
                return [];
            } else {
                if (!$result) {
                    return [];
                } else {
                    return $result;
                }
            }
            $Allprice1 = 0;
            foreach ($result as $rows) {
                $Allprice1 += $rows['price'];
            }
            $object = new stdClass();
            $object->BG1 = $Allprice1;
            $object->result = $result;
            return $object;
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }
}

