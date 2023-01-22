<?php
include_once('../database/Search_Sales_Product_Exchange.php');
//กรณีที่ 1 ถ้าไม่ค้นหาทั้งจาก keyword และ ตัวเลือกประเภทสินค้า จะโชว์ทั้งหมด
if(!isset($_GET['keyword'])){
    $sales = new Search_Sales_Product_Exchange();
    $rows = $sales->fetchAll();
    echo json_encode($rows);
}
else if(isset($_GET['keyword'])){
    $sales = new Search_Sales_Product_Exchange();
    $rows = $sales->searchsales($_GET['keyword']);
    echo json_encode($rows);
}