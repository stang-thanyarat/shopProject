<?php
include_once ("Connection.php");
Class Sales{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT * FROM sales_tb ";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchById($id){
        $sql = "SELECT * FROM sales_tb WHERE sales_list_id=?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt ->fetch();
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM sales_tb WHERE sales_list_id=?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO sales_tb (payment_sl, employee_id, price, discount ,price_paid, import_files, note)
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['sales_dt'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['employee_id'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['sales_amt'], PDO::PARAM_INT);
        $stmt->bindParam(6, $data['discount'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['price_paid'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['import_files'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['note'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE sales_tb
        SET payment_sl = ?, employee_id = ?, price = ?, discount = ?, price_paid = ?, import_files = ?, note = ?
        WHERE sales_list_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['sales_dt'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['employee_id'], PDO::PARAM_INT);
        $stmt->bindParam(4, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(5, $data['sales_amt'], PDO::PARAM_INT);
        $stmt->bindParam(6, $data['discount'], PDO::PARAM_STR);
        $stmt->bindParam(7, $data['price_paid'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['import_files'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['note'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['sales_list_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>