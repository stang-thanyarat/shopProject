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
        $sql = "SELECT CP.*,P.product_name,P.brand,C.category_name FROM costprice_tb CP,product_tb P,category_tb C WHERE CP.product_id = P.product_id = C.category_id  ORDER BY CP.order_dt DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (!$result) {
            return [];
        } else {
            return $result;
        }
    }

    public function fetchByProductId($id)
    {
        try{
            $sql = "SELECT CP.*,P.*,C.category_name FROM costprice_tb CP,product_tb P,category_tb C WHERE CP.category_id = C.category_id = P.product_id AND P.product_id = ? ORDER BY CP.costprice_dt DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                return [];
            } else {
                return $result;
            }
        }catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }
    public function fetchById($id)
    {
       try{
           $sql = "SELECT * FROM costprice_tb WHERE product_id = ?";
           $stmt = $this->conn->prepare($sql);
           $stmt->bindParam(1, $id, PDO::PARAM_INT);
           $stmt->execute();
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $result;
       }catch (Exception $e) {
           http_response_code(500);
           echo strval($e);
       }
    }

    public function fetchBetween($id,$start,$end)
    {
        try{
            $sql = "SELECT * FROM costprice_tb WHERE product_id = ? AND costprice_dt BETWEEN ? AND ? ORDER BY costprice_dt DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->bindParam(2, $start, PDO::PARAM_STR);
            $stmt->bindParam(3, $end, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (!$result) {
                return [];
            } else {
                return $result;
            }
        }catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function insert($data)
    {
        try {
            $sql = "SET FOREIGN_KEY_CHECKS=0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $sql = "INSERT INTO costprice_tb (product_id, category_id, product_name, cost_price) 
            VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);//รหัสข้อมูลพนักงาน
            $stmt->bindParam(2, $data['category_id'], PDO::PARAM_STR);//คำนำหน้า
            $stmt->bindParam(3, $data['product_name'], PDO::PARAM_STR);//ข้อตกลงของสัญญา
            $stmt->bindParam(4, $data['cost_price'], PDO::PARAM_STR);//นามสกุลลูกค้า
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function update($data)
    {
        try {
            $sql = "SET FOREIGN_KEY_CHECKS=0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $sql = "UPDATE contract_tb
            SET product_id = ?, category_id = ?,product_name = ?,cost_price = ?
            WHERE unique_id = ?";
            $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);//รหัสข้อมูลพนักงาน
            $stmt->bindParam(2, $data['category_id'], PDO::PARAM_STR);//คำนำหน้า
            $stmt->bindParam(3, $data['product_name'], PDO::PARAM_STR);//ข้อตกลงของสัญญา
            $stmt->bindParam(4, $data['cost_price'], PDO::PARAM_STR);//นามสกุลลูกค้า
            $stmt->bindParam(5, $data['unique_id'], PDO::PARAM_INT);//รหัสข้อมูลพนักงาน
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }
}

?>