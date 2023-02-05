<?php
include_once("Connection.php");

class Contract
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection();
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM contract_tb WHERE contract_code";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchById($id)
    {
        try {
            $sql = "SELECT C.*,D.* FROM contract_tb C, debt_payment_details_tb D WHERE C.contract_code = D.contract_code AND C.contract_code = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function getLastId(){
        $data = $this->fetchLast();
        return $data['contract_code'];
    }

    public function fetchLast() //Contract
    {
        try {
            $sql = "SELECT * FROM contract_tb ORDER BY contract_code DESC LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch( PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function fetchByPayId($id)
    {
        try {
            $sql = "SELECT C.*,D.* FROM contract_tb C, debt_payment_details_tb D WHERE C.contract_code = D.contract_code AND C.contract_code = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function fetchByPDFId($id)
    {
        try {
            $sql = "SELECT C.*,E.*,S.* FROM contract_tb C , employee_tb E , sales_tb S  WHERE C.contract_code = ? AND E.employee_id = C.employee_id AND  E.sales_list_id  = C.sales_list_id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function searchByName($keyword)
    {
        $like = "%" . $keyword . "%";
        $sql = "SELECT * FROM contract_tb WHERE customer_firstname LIKE ? OR customer_lastname LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like, PDO::PARAM_STR);
        $stmt->bindParam(2, $like, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //ส่วนการค้นหาลูกค้า
    public function searchBycopyID($keyword)
    {
        $like = "$keyword";
        $sql = "SELECT CT.*,DB.* FROM contract_tb CT,debt_payment_details_tb DB WHERE customer_img = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM contract_tb WHERE contract_code=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        try {
            $sql = "SET FOREIGN_KEY_CHECKS=0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $sql = "INSERT INTO contract_tb (date_contract, employee_id, /*sales_list_id,*/ customer_prefix, contract_details, 
                    witness1_prefix, witness1_name, witness1_lastname,
                    witness2_prefix, witness2_name, witness2_lastname,
                    witness3_prefix, witness3_name, witness3_lastname,
            customer_firstname, customer_lastname, customer_img, date_send/*, contract_attachment*/) 
            VALUES (DATE_ADD(CURRENT_TIMESTAMP(), INTERVAL ? DAY),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?/*,?,?*/)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['date_contract'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['employee_id'], PDO::PARAM_INT);
            $stmt->bindParam(3, $data['customer_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['contract_details'], PDO::PARAM_STR);
            $stmt->bindParam(5, $data['witness1_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(6, $data['witness1_name'], PDO::PARAM_STR);
            $stmt->bindParam(7, $data['witness1_lastname'], PDO::PARAM_STR);
            $stmt->bindParam(8, $data['witness2_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(9, $data['witness2_name'], PDO::PARAM_STR);
            $stmt->bindParam(10, $data['witness2_lastname'], PDO::PARAM_STR);
            $stmt->bindParam(11, $data['witness3_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(12, $data['witness3_name'], PDO::PARAM_STR);
            $stmt->bindParam(13, $data['witness3_lastname'], PDO::PARAM_STR);
            $stmt->bindParam(14, $data['customer_firstname'], PDO::PARAM_STR);
            $stmt->bindParam(15, $data['customer_lastname'], PDO::PARAM_STR);
            $stmt->bindParam(16, $data['customer_img'], PDO::PARAM_STR);
            $stmt->bindParam(17, $data['date_send'], PDO::PARAM_STR);
            //$stmt->bindParam(12, $data['contract_attachment'], PDO::PARAM_STR);
            //$stmt->bindParam(12, $data['sales_list_id'], PDO::PARAM_INT);
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
            SET date_contract = ?, employee_id = ?, /*sales_list_id=?,*/customer_prefix = ?,contract_details = ?,witness1 = ?,witness2 = ?,witness3 = ?,
            contract_attachment = ?,customer_firstname = ?,customer_lastname = ?,customer_img = ?,date_send = ?
            WHERE contract_code=?";
            $stmt->bindParam(1, $data['date_contract'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['employee_id'], PDO::PARAM_INT);
            $stmt->bindParam(3, $data['customer_prefix'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['contract_details'], PDO::PARAM_STR);
            $stmt->bindParam(5, $data['witness1'], PDO::PARAM_STR);
            $stmt->bindParam(6, $data['witness2'], PDO::PARAM_STR);
            $stmt->bindParam(7, $data['witness3'], PDO::PARAM_STR);
            $stmt->bindParam(8, $data['customer_firstname'], PDO::PARAM_STR);
            $stmt->bindParam(9, $data['customer_lastname'], PDO::PARAM_STR);
            $stmt->bindParam(10, $data['customer_img'], PDO::PARAM_STR);
            $stmt->bindParam(11, $data['date_send'], PDO::PARAM_STR);
            $stmt->bindParam(12, $data['contract_attachment'], PDO::PARAM_STR);
            /*$stmt->bindParam(14, $data['sales_list_id'], PDO::PARAM_INT);*/
            $stmt->bindParam(13, $data['contract_code'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }
}
