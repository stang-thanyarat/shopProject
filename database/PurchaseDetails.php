<?php
include_once ("Connection.php");
Class PurchaseDetails{
    private $conn;
    function __construct()
    {
        $this -> conn = Connection();
    }
    public function fetchAll(){
        $sql = "SELECT * FROM purchase_details_tb ";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll();
        return $result;

    }

    public function fetchById($id){
        $sql = "SELECT * FROM purchase_details_tb WHERE unique_id=?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt ->fetch();
        return $result;

    }

    public function delete($id){
        $sql = "DELETE FROM purchase_details_tb WHERE unique_id=?;";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO purchase_details_tb (sales_list_id, product_id, unitprice, sold_amount,stock_id)
        VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['sales_list_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['unitprice'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['sold_amount'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['stock_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE purchase_details_tb
        SET sales_list_id = ?, product_id = ?, unitprice = ?, sold_amount = ?, stock_id = ?
        WHERE unique_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data['sales_list_id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $data['product_id'], PDO::PARAM_INT);
        $stmt->bindParam(3, $data['unitprice'], PDO::PARAM_STR);
        $stmt->bindParam(4, $data['sold_amount'], PDO::PARAM_INT);
        $stmt->bindParam(5, $data['stock_id'], PDO::PARAM_INT);
        $stmt->bindParam(12, $data['unique_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>