<?php
include_once ("Connection.php");

Class Contract{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT * FROM contract_tb ";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchById($id){
        $sql = "SELECT * FROM contract_tb WHERE contract_code=?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt ->fetch();
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM contract_tb WHERE contract_code=?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO contract_tb (date_contract, sis_id, sales_list_id,selldate,contract_details,witness1,witness2,witness3,owner_status,contract_attachment,due_date,interest_rate,outstanding,interest_payable) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['date_contract'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['sis_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['sales_list_id'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['selldate'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['contract_details'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['witness1'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['witness2'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['witness3'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['owner_status'], PDO::PARAM_INT);
        $stmt->bindParam(10, $data['contract_attachment'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['due_date'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['interest_rate'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['outstanding'], PDO::PARAM_STR);
        $stmt->bindParam(14, $data['interest_payable'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE contract_tb
        SET date_contract=?, sis_id=?, sales_list_id=?,selldate=?,contract_details=?,witness1=?,witness2=?,witness3=?,owner_status=?,contract_attachment=?,due_date=?,interest_rate=?,outstanding=?,interest_payable=?
        WHERE contract_code=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['date_contract'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['sis_id '], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['sales_list_id'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['selldate'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['contract_details'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['witness1'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['witness2'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['witness3'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['owner_status'], PDO::PARAM_INT);
        $stmt->bindParam(10, $data['contract_attachment'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['due_date'], PDO::PARAM_STR);
        $stmt->bindParam(12, $data['interest_rate'], PDO::PARAM_STR);
        $stmt->bindParam(13, $data['outstanding'], PDO::PARAM_STR);
        $stmt->bindParam(14, $data['interest_payable'], PDO::PARAM_STR);
        $stmt->bindParam(15, $data['contract_code'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>