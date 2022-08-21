<?php
include_once("Connection.php");
class UserAccount
{
    private $conn;
    function __construct()
    {
        $this->conn = Connection();
    }
    public function fetchAll()
    {
        try {
            $sql = "SELECT * FROM user_account_tb";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }

    public function updateStatus($status, $id)
    {
        try {
            $sql = "UPDATE user_account_tb SET account_user_status = ? WHERE unique_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $status, PDO::PARAM_INT);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function fetchById($id)
    {
        try {
            $sql = "SELECT * FROM user_account_tb WHERE unique_id=?";
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

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM user_account_tb WHERE unique_id=?;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function fetchByEmail($email){
        try {
            $sql = "SELECT * FROM user_account_tb WHERE account_username=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $email, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (Exception $e) {
            http_response_code(500);
            return [];
        }
    }



    public function search($keyword, $type = null)
    {
        $like = "%".$keyword."%";
        $sql = "SELECT * FROM user_account_tb WHERE (SELECT employee_id FROM employee_tb WHERE employee_firstname LIKE ?  OR employee_lastname LIKE ?)";
        if (!is_null($type)) {
            $sql .= " AND account_user_type=?";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like , PDO::PARAM_STR);
        if (!is_null($type)) {
            $stmt->bindParam(2, $type, PDO::PARAM_INT);
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function insert($data)
    {
        try {
            $sql = "INSERT INTO user_account_tb (account_username, account_password, account_user_status, employee_id) 
        VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['account_username'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['account_password'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['account_user_status'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['employee_id'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE user_account_tb
        SET account_username = ?, account_password = ?, account_user_status = ?, employee_id = ?,
        WHERE unique_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $data['account_username'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['account_password'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['account_user_status'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['employee_id'], PDO::PARAM_INT);
            $stmt->bindParam(5, $data['unique_id'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo strval($e);
        }
    }
}
