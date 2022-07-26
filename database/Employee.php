<?php
include("Connection.php");
class Employee
{
    private $conn;
    function __construct()
    {
        $this->conn = Connection();
    }
    public function fetchAll()
    {
        $sql = "SELECT * FROM employee_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM employee_tb WHERE employee_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM employee_tb WHERE employee_id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO employee_tb (employee_model, employee_startwork_dt, employee_prefix, employee_firstname, employee_lastname, employee_address, employee_birthday, employee_card_id, employee_telephone, employee_email, employee_card_id_copy, employee_address_copy, bank_name, bank_number, bank_account) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['employee_model'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['employee_startwork_dt'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['employee_prefix'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['employee_firstname'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['employee_lastname'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['employee_address'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['employee_birthday'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['employee_card_id'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['employee_telephone'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['employee_email'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['employee_card_id_copy'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['employee_address_copy'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['bank_name'], PDO::PARAM_STR);
        $stmt->bindParam(14, $data['bank_number'], PDO::PARAM_STR);
        $stmt->bindParam(15, $data['bank_account'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE employee_tb
        SET employee_model = ?, employee_startwork_dt = ?, employee_prefix = ?, employee_firstname = ?, employee_lastname = ?, employee_address = ?, employee_birthday = ?,
        employee_card_id = ?, employee_telephone = ?, employee_email = ?, employee_card_id_copy = ?, employee_address_copy = ?, bank_name = ?, bank_number = ?, bank_account = ?,
        WHERE employee_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['employee_model'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['employee_startwork_dt'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['employee_prefix'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['employee_firstname'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['employee_lastname'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['employee_address'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['employee_birthday'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['employee_card_id'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['employee_telephone'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['employee_email'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['employee_card_id_copy'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['employee_address_copy'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['bank_name'], PDO::PARAM_STR);
        $stmt->bindParam(14, $data['bank_number'], PDO::PARAM_STR);
        $stmt->bindParam(15, $data['bank_account'], PDO::PARAM_STR);
        $stmt->bindParam(16, $data['employee_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
