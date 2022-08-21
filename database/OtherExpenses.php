<?php
include ("Connection.php");
Class OtherExpenses{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT * FROM other_expenses_tb ";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchById($id){
        $sql = "SELECT * FROM other_expenses_tb WHERE unique_id=?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt ->fetch();
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM other_expenses_tb WHERE unique_id = ?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO other_expenses_tb (order_id, listother, priceother,) VALUES (?, ?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['order_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['listother'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['priceother'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE other_expenses_tb
        SET order_id = ?, listother = ?, priceother = ?
        WHERE unique_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['order_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['listother'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['priceother'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['unique_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>