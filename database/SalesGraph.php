<?php
include_once("Connection.php");

class SalesGraph
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
       try{
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
               }
           }
           $result = $res;
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

    public function fetchAllDate($date)
    {
        try{
            $sql = "SELECT SAD.*,P.* FROM sales_details_tb SAD,product_tb P WHERE SAD.product_id = P.product_id AND SAD.sales_dt = ? ORDER BY SAD.sales_amt DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $date, PDO::PARAM_STR);
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
                }
            }
            $result = $res;
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

    public function fetchAllDateAndId($id, $date, $limit = -1)
    {
        try{
            $sql = "SELECT SAD.*,P.* FROM sales_details_tb SAD,product_tb P WHERE SAD.sales_list_id = P.product_id AND SAD.sales_dt = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $date, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $dup = [];
            $res = [];
            $ro = 0;
            foreach ($result as $r) {
                if ($r['category_id'] == $id && $id != -1) {
                    $ro++;
                    if (!in_array($r['product_id'], $dup)) {
                        $r['count'] = 1;
                        $res[] = $r;
                        $dup[] = $r['product_id'];
                    } else {
                        $i = array_search($r['product_id'], $dup);
                        $res[$i]['count']++;
                        $res[$i]['sales_amt'] += $r['sales_amt'];
                    }
                    if ($limit != -1 && $ro == $limit) {
                        break;
                    }
                } else if ($id == -1) {
                    $ro++;
                    if (!in_array($r['product_id'], $dup)) {
                        $r['count'] = 1;
                        $res[] = $r;
                        $dup[] = $r['product_id'];
                    } else {
                        $i = array_search($r['product_id'], $dup);
                        $res[$i]['count']++;
                        $res[$i]['sales_amt'] += $r['sales_amt'];
                    }
                    if ($limit != -1 && $ro == $limit) {
                        break;
                    }
                }
            }
            $result = $res;
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
           $sql = "SELECT SAD.*,P.* FROM sales_details_tb SAD,product_tb P WHERE SAD.product_id = P.product_id AND P.category_id = ? ORDER BY SAD.sales_amt DESC";
           $stmt = $this->conn->prepare($sql);
           $stmt->bindParam(1, $id, PDO::PARAM_INT);
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
               }
           }
           $result = $res;
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
}

?>