<?php
include_once("Connection.php");
include_once('Category.php');

class Product
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM product_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM product_tb WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetchExchange1Id()
    {
        $sql = "SELECT * FROM product_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //แจ้งเตือนสินค้าใกล้หมด
    public function fetchLost()
    {
        $sql = "SELECT * FROM product_tb WHERE product_rm_unit <= notification_amt AND sales_status = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

   /* public function fetchAddCategory()
    {
        $data = $this->fetchAll();
        $sumData = [];
        foreach ($data as $row) {
            if ($row['sales_status'] == 1 && $row['product_rm_unit'] > 0) {
                $catData = (new Category())->fetchById($row);
                $sumData[] = array_merge($row, $catData);
            } elseif ($row['sales_status'] == 0 && $row['product_rm_unit'] > 0) {
                $catData = (new Category())->fetchById($row);
                $sumData[] = array_merge($row, $catData);
            }
        }
        return $sumData;
    }*/

        public function fetchAddCategory()
         {
             $sql = "SELECT P.*,C.* FROM category_tb C,product_tb P WHERE P.category_id = C.category_id ORDER BY P.product_id ASC ";
             $stmt = $this->conn->prepare($sql);
             $stmt->execute();
             $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
             return $result;
         }

    public function fetchByName($keyword){
        $like = "%$keyword%";
        $sql = "SELECT * FROM product_tb WHERE product_name LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function search($keyword, $id = null)
    {
        $like = "%$keyword%";
        if(is_null($id)){
            $sql = "SELECT C.*,P.* FROM category_tb C,product_tb P WHERE C.category_id = P.category_id AND product_name LIKE ?";

        }else{
            $sql = "SELECT C.*,P.* FROM category_tb C,product_tb P WHERE C.category_id = ? ";
        }
        $stmt = $this->conn->prepare($sql);
        if(is_null($id)){
            $stmt->bindParam(1, $like, PDO::PARAM_STR);
        }else{
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->bindParam(2, $like, PDO::PARAM_STR);
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function autoComplete($keyword)
    {
        $like = $keyword . "%";
        $sql = "SELECT * FROM product_tb WHERE product_name LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = [];

        foreach($result as $row){
            $object = new stdClass();
            $object->label = $row['product_name'];
            $object->value = $row['product_id'];
            $json[]=$object;
        }
        return json_encode($json);
    }

    //สต็อกสินค้า

    public function getStockQuantity($id)
    {
        $sql = "SELECT product_rm_unit FROM product_tb WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function cutStock($id, $amount)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "UPDATE Orders SET product_rm_unit = product_rm_unit - ? WHERE product_id=?";
        $stmt->bindParam(1, $id, PDO::PARAM_INT); //Boolean ใช้ INT
        $stmt->bindParam(2, $amount, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function addStock($id)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $q = $this->getStockQuantity($id);
        $sql = "UPDATE Orders SET product_dlt_unit = product_dlt_unit + ? WHERE product_id=?";
        $stmt->bindParam(1, $id, PDO::PARAM_INT); //Boolean ใช้ INT
        $stmt->bindParam(2, $q['product_rm_unit'], PDO::PARAM_INT);
        $stmt->execute();
    }

    //การแทรก

    public function insert($data)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO product_tb (product_name, category_id, brand, model, sell_id, product_detail, product_img, product_detail_img, product_dlt_unit, product_unit, price, cost_price, notification_amt, sales_status, set_n_amt, date_n_amt, notification_amt2, product_rm_unit, vat, set_exchange) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['brand'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['model'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['sell_id'], PDO::PARAM_INT);
        $stmt->bindParam(6, $data['product_detail'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['product_img1'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['product_img2'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['product_dlt_unit'], PDO::PARAM_INT);
        $stmt->bindParam(10, $data['product_unit'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['cost_price'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['notification_amt'], PDO::PARAM_INT);
        $stmt->bindParam(14, $data['sales_status'], PDO::PARAM_INT);
        $stmt->bindParam(15, $data['set_n_amt'], PDO::PARAM_INT);
        $stmt->bindParam(16, $data['date_n_amt'], PDO::PARAM_STR);
        $stmt->bindParam(17, $data['notification_amt2'], PDO::PARAM_INT); //Boolean ใช้ INT
        $stmt->bindParam(18, $data['product_dlt_unit'], PDO::PARAM_INT);
        $stmt->bindParam(19, $data['vat'], PDO::PARAM_INT);
        $stmt->bindParam(20, $data['set_exchange'], PDO::PARAM_INT);
        $stmt->execute();
    }

    //การอัพเดต

    public function updateimage($filename, $img, $product_id)
    {
        try {
            $colname = ['product_img', 'product_detail_img'];
            if (in_array($filename, $colname))
                $sql = "UPDATE product_tb SET $filename = ? WHERE product_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $img, PDO::PARAM_STR);
            $stmt->bindParam(2, $product_id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    function updateStatus($status, $id)
    {
        $sql = "UPDATE product_tb SET sales_status = ? WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $status, PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE product_tb
        SET product_name = ?, 
            category_id = ?, brand = ?, model = ?, sell_id = ?, product_detail = ?, product_dlt_unit = ?, product_unit = ?, price = ?, cost_price = ?, notification_amt = ?, set_n_amt = ?, date_n_amt = ?, notification_amt2 = ? , vat = ?, set_exchange = ?
        WHERE product_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['product_name'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['category_id'], PDO::PARAM_INT);
            $stmt->bindParam(3, $data['brand'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['model'], PDO::PARAM_STR);
            $stmt->bindParam(5, $data['sell_id'], PDO::PARAM_INT);
            $stmt->bindParam(6, $data['product_detail'], PDO::PARAM_STR);
            $stmt->bindParam(7, $data['product_dlt_unit'], PDO::PARAM_INT);
            $stmt->bindParam(8, $data['product_unit'], PDO::PARAM_STR);
            $stmt->bindParam(9, $data['price'], PDO::PARAM_STR);
            $stmt->bindParam(10, $data['cost_price'], PDO::PARAM_STR);
            $stmt->bindParam(11, $data['notification_amt'], PDO::PARAM_INT);
            $stmt->bindParam(12, $data['set_n_amt'], PDO::PARAM_INT);
            $stmt->bindParam(13, $data['date_n_amt'], PDO::PARAM_STR);
            $stmt->bindParam(14, $data['notification_amt2'], PDO::PARAM_INT);
            $stmt->bindParam(15, $data['vat'], PDO::PARAM_INT);
            $stmt->bindParam(16, $data['set_exchange'], PDO::PARAM_INT);
            $stmt->bindParam(17, $data['product_id'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }
    public function countCategoryId($id, $on)
    {
        $sql = "SELECT * FROM product_tb LEFT JOIN category_tb ON product_tb.category_id = category_tb.category_id ";
        if ($on) {
            $sql .= " AND product_tb.sales_status=1";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }

    public function fetchByCategoryId($id)
    {
        $sql = "SELECT * FROM product_tb WHERE category_id = ? AND sales_status = 1  AND product_rm_unit > 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetchVat($id)
    {
        $sql = "SELECT vat FROM product_tb WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["vat"];
    }

    public function deleteByCategoryId($id)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "DELETE FROM product_tb WHERE category_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function delete($id)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $sql = "DELETE FROM product_tb WHERE product_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}