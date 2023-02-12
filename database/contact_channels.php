<?php
include_once("Connection.php");

class contact_channels
{
    private $conn;

    function __construct()
    {
        try {
            $this->conn = Connection();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function fetchAll()
    {
        try {
            $sql = "SELECT * FROM contact_channels_tb";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll( PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }


    public function fetchById($id)
    {
        try {
            $sql = "SELECT * FROM contact_channels_tb WHERE unique_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch( PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }



 


    public function insert($data)
    {
        try {
            $sql = "SET FOREIGN_KEY_CHECKS=0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $sql = "INSERT INTO contact_channels_tb (sell_id, name_contact, note) 
        VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['sell_id'], PDO::PARAM_INT);
            $stmt->bindParam(2, $data['name_contact'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['note'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }


    public function update($data)
    {

        try {
            $sql = "UPDATE contact_channels_tb
        SET sell_id = ?, name_contact = ?, note = ?, 
        
        WHERE unique_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['sell_id'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['name_contact'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['note'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }
}
