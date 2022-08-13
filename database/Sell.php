<?php
include("Connection.php");
class Sell
{
    private $conn;
    function __construct()
    {
        $this->conn = Connection();
    }
    public function fetchAll()
    {
        try {
            $sql = "SELECT * FROM sell_tb";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function fetchById($id)
    {
        try {
            $sql = "SELECT * FROM sell_tb WHERE sell_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function emailCheck($email)
    {
        try {
            $sql = "SELECT * FROM sell_tb WHERE seller_email=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM sell_tb WHERE sell_id=?;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
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
            $sql = "INSERT INTO sell_tb (sell_type, sell_name, sell_address, sell_tax_id, sell_telephone, sell_website, seller_firstname, 
        seller_lastname, seller_nickname, seller_email, seller_telephone, seller_lind_id, seller_card_id, seller_cardname, sell_documents, sell_note) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['sell_type'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['sell_name'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['sell_address'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['sell_tax_id'], PDO::PARAM_STR);
            $stmt->bindParam(5, $data['sell_telephone'], PDO::PARAM_STR);
            $stmt->bindParam(6, $data['sell_website'], PDO::PARAM_STR);
            $stmt->bindParam(7, $data['seller_firstname'], PDO::PARAM_STR);
            $stmt->bindParam(8, $data['seller_lastname'], PDO::PARAM_STR);
            $stmt->bindParam(9, $data['seller_nickname'], PDO::PARAM_STR);
            $stmt->bindParam(10, $data['seller_email'], PDO::PARAM_STR);
            $stmt->bindParam(11, $data['seller_telephone'], PDO::PARAM_STR);
            $stmt->bindParam(12, $data['seller_lind_id'], PDO::PARAM_STR);
            $stmt->bindParam(13, $data['seller_card_id'], PDO::PARAM_STR);
            $stmt->bindParam(14, $data['seller_cardname'], PDO::PARAM_STR);
            $stmt->bindParam(15, $data['sell_documents'], PDO::PARAM_STR);
            $stmt->bindParam(16, $data['sell_note'], PDO::PARAM_STR);
            $stmt->execute();
            //return($data.'***'.$sql);
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE sell_tb
        SET sell_type = ?, sell_address = ?, sell_tax_id = ?, sell_telephone = ?, sell_website = ?, sell_name = ?,
        seller_firstname = ?, seller_lastname = ?, seller_nickname = ?, seller_email = ?, seller_telephone = ?, seller_lind_id = ?, seller_card_id = ?,
        seller_cardname = ?, sell_documents = ?, sell_note = ?, 
        WHERE sell_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['sell_type'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['sell_address'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['sell_tax_id'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['sell_telephone'], PDO::PARAM_STR);
            $stmt->bindParam(5, $data['sell_website'], PDO::PARAM_STR);
            $stmt->bindParam(6, $data['sell_name'], PDO::PARAM_STR);
            $stmt->bindParam(7, $data['seller_firstname'], PDO::PARAM_STR);
            $stmt->bindParam(8, $data['seller_lastname'], PDO::PARAM_STR);
            $stmt->bindParam(9, $data['seller_nickname'], PDO::PARAM_STR);
            $stmt->bindParam(10, $data['seller_email'], PDO::PARAM_STR);
            $stmt->bindParam(11, $data['seller_telephone'], PDO::PARAM_STR);
            $stmt->bindParam(12, $data['seller_lind_id'], PDO::PARAM_STR);
            $stmt->bindParam(13, $data['seller_card_id'], PDO::PARAM_STR);
            $stmt->bindParam(14, $data['seller_cardname'], PDO::PARAM_STR);
            $stmt->bindParam(15, $data['sell_documents'], PDO::PARAM_STR);
            $stmt->bindParam(16, $data['sell_note'], PDO::PARAM_STR);
            $stmt->bindParam(17, $data['sell_id'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }
}
