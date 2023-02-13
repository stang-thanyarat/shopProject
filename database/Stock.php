<?php
include_once("Connection.php");
include_once("Product.php");

class Stock
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
       try{
           $sql = "SELECT S.*,P.*,O.* FROM stock_tb S,product_tb P, order_tb O WHERE S.product_id =  P.product_id AND S.order_id = O.order_id ORDER BY S.exp_date DESC";
           $stmt = $this -> conn -> prepare($sql);
           $stmt->execute();
           $result = $stmt ->fetchAll();
           if (!$result) {
               return [];
           } else {
               return $result;
           }
       } catch (Exception $e) {
           http_response_code(500);
           return [];
       }
    }

    public function fetchAllDate($date)
    {
       try{
           $sql = "SELECT S.*,P.*,O.* FROM stock_tb S,product_tb P, order_tb O WHERE S.product_id =  P.product_id AND S.order_id = O.order_id AND S.exp_date = ? ORDER BY S.exp_date DESC";
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
                   $res[$i]['amount_exp'] += $r['amount_exp'];
               }
           }
           $result = $res;
           if (!$result) {
               return [];
           } else {
               return $result;
           }
       } catch (Exception $e) {
           http_response_code(500);
           return [];
       }
    }

    public function fetchAllCondition($date,$id,$keyword)
    {
    try{
        $sql = "SELECT S.*,OD.*,O.order_id,O.datereceive,P.* FROM stock_tb S,order_details_tb OD,order_tb O,product_tb P WHERE S.stock_id = OD.unique_id = O.order_id = P.product_id AND P.category_id = ?
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
                $res[$i]['amount_exp'] += $r['amount_exp'];
            }
        }
        $result = $res;
        if (!$result) {
            return [];
        } else {
            return $result;
        }
    } catch (Exception $e) {
        http_response_code(500);
        return [];
    }
    }

    public function searchsales($keyword, $id = null)
    {
       try{
           $like = "%$keyword%";
           if (is_null($id)) {
               $sql = "SELECT S.*,OD.*,O.order_id,O.datereceive,P.* FROM stock_tb S,order_details_tb OD,order_tb O,product_tb P WHERE S.stock_id = OD.unique_id = O.order_id = P.product_id  AND product_name LIKE ?";

           } else {
               $sql = "SELECT S.*,OD.*,O.order_id,O.datereceive,P.* FROM stock_tb S,order_details_tb OD,order_tb O,product_tb P WHERE S.stock_id = OD.unique_id = O.order_id = P.product_id AND  P.category_id = ?  AND product_name LIKE ? ";
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
                   $res[$i]['amount_exp'] += $r['amount_exp'];
               }
           }
           $result = $res;
           if (!$result) {
               return [];
           } else {
               return $result;
           }
       } catch (Exception $e) {
           http_response_code(500);
           return [];
       }
    }

    public function fetchAllDateAndKeyword($date,$keyword)
    {
        try{
            $sql = "SELECT S.*,OD.*,O.order_id,O.datereceive,P.* FROM stock_tb S,order_details_tb OD,order_tb O,product_tb P WHERE S.stock_id = OD.unique_id = O.order_id = P.product_id  
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
                    $res[$i]['amount_exp'] += $r['amount_exp'];
                }
            }
            $result = $res;
            if (!$result) {
                return [];
            } else {
                return $result;
            }
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function fetchAllDateAndId($date,$id)
    {
       try{
           $sql = "SELECT S.*,OD.*,O.order_id,O.datereceive,P.* FROM stock_tb S,order_details_tb OD,order_tb O,product_tb P WHERE S.stock_id = OD.unique_id = O.order_id = P.product_id AND  P.category_id = ?
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
                   $res[$i]['amount_exp'] += $r['amount_exp'];
               }
           }
           $result = $res;
           if (!$result) {
               return [];
           } else {
               return $result;
           }
       } catch (Exception $e) {
           http_response_code(500);
           return [];
       }
    }

    public function fetchById($id)
    {
        try{
            $sql = "SELECT P.*,O.order_id,O.datereceive,S.* FROM order_tb O,stock_tb S,product_tb P WHERE P.product_id = S.product_id AND P.category_id = ? ORDER BY S.exp_date DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $dup = [];
            $res = [];
            foreach ($result as $r) {
                if (!in_array($r['stock_id'], $dup)) {
                    $r['count']=1;
                    $res[] = $r;
                    $dup[] = $r['stock_id'];
                }
            }
            $result = $res;
            if (!$result) {
                return [];
            } else {
                return $result;
            }
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function fetchByStockId($id)
    {
        try{
            $sql = "SELECT FROM stock_tb WHERE stock_id=?;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function delete($id)
    {
        try{
            $sql = "DELETE FROM stock_tb WHERE stock_id=?;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function insert($data)
    {
        try{
            $sql = "SET FOREIGN_KEY_CHECKS=0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $sql = "INSERT INTO stock_tb (order_id, product_id, exp_date, amount_exp) 
        VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['order_id'], PDO::PARAM_INT);
            $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
            $stmt->bindParam(3, $data['exp_date'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['amount_exp'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function update($data)
    {
        try{
            $sql = "UPDATE stock_tb
        SET order_id = ?, product_id = ?, exp_date = ?, amount_exp = ?
        WHERE stock_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['order_id'], PDO::PARAM_INT);
            $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
            $stmt->bindParam(3, $data['exp_date'], PDO::PARAM_INT);
            $stmt->bindParam(4, $data['amount_exp'], PDO::PARAM_STR);
            $stmt->bindParam(5, $data['stock_id'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }
}

?>