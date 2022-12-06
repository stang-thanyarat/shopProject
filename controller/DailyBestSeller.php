<?php
include_once('../database/Sales.php');
/*function getdata(){
    $sales = new Sales();
    if ((!isset($_GET['date']) && (!isset($_GET['keyword']))) || ($_GET['date'] == "" && $_GET['keyword'] == "")) {
        $rows = $sales->fetchAll();
    } else if ((isset($_GET['date']) && $_GET['date'] != "") && (!isset($_GET['keyword']) || $_GET['keyword'] == "")) {
        $rows = $sales->fetchByDate($_GET['date']);
    } else if ((!isset($_GET['date']) || $_GET['date'] == "") && (isset($_GET['keyword']) && $_GET['keyword'] != "")) {
        $rows = $sales->search($_GET['keyword']);
    } else if ((isset($_GET['date']) && $_GET['date'] != "") && (isset($_GET['keyword']) && $_GET['keyword'] != "")) {
        $rows = $sales->search($_GET['keyword'],);
    }
    return $rows;
} */

//กรณีที่ 1 ถ้าไม่ค้นหาทั้งจาก keyword และ ตัวเลือกประเภทสินค้า จะโชว์ทั้งหมด
if(!isset($_GET['category_id'])&&(!isset($_GET['keyword']))){
    $sales = new Sales();
    $rows = $sales->fetchAddCategorysales();
    echo json_encode($rows);
}
//
else if(isset($_GET['category_id'])&&(!isset($_GET['keyword']))){
    $sales = new Sales();
    $rows = $sales->fetchByCategoryIdsales($_GET['category_id']);
    echo json_encode($rows);
}
else if(!isset($_GET['category_id'])&&(isset($_GET['keyword']))){
    $sales = new Sales();
    $rows = $sales->searchsales($_GET['keyword']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(isset($_GET['keyword']))){
    $sales = new Sales();
    $rows = $sales->searchsales($_GET['keyword'],$_GET['category_id']);
    echo json_encode($rows);

}
