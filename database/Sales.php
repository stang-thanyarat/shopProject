<?php
include_once ("Connection.php");

Class Sales{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){

        $sql = "SELECT SA.*,P.product_name FROM sales_tb SA,product_tb P WHERE SA.product_id = P.product_id ";
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
        $sql = "INSERT INTO sales_tb (product_id, sales_dt, payment_sl, employee_id, price, sales_amt, discount ,price_paid, import_files, note, stock_id)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['sales_dt'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['employee_id'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['sales_amt'], PDO::PARAM_INT);
        $stmt->bindParam(7, $data['discount'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['price_paid'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['import_files'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['note'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['stock_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE sales_tb
        SET product_id = ?, sales_dt = ?, payment_sl = ?, employee_id = ?, price = ?, sales_amt = ?, discount = ?, price_paid = ?, import_files = ?, note = ?, stock_id = ?
        WHERE sales_list_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['sales_dt'], PDO::PARAM_STR);
        $stmt->bindParam(3, $data['payment_sl'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['employee_id'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(6, $data['sales_amt'], PDO::PARAM_INT);
        $stmt->bindParam(7, $data['discount'], PDO::PARAM_STR);
        $stmt->bindParam(8, $data['price_paid'], PDO::PARAM_STR);
        $stmt->bindParam(9, $data['import_files'], PDO::PARAM_STR);
        $stmt->bindParam(10, $data['note'], PDO::PARAM_STR);
        $stmt->bindParam(11, $data['stock_id'], PDO::PARAM_INT);
        $stmt->bindParam(12, $data['sales_list_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>