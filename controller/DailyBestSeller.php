<?php
include_once('../database/DailyBestSeller.php');
//กรณีที่ 1 ถ้าไม่ค้นหาทั้งจาก keyword และ ตัวเลือกประเภทสินค้า จะโชว์ทั้งหมด
if(!isset($_GET['category_id'])&&(!isset($_GET['keyword']))&&(!isset($_GET['date']))){
    $sales = new Sales();
    $rows = $sales->fetchAll();
    echo json_encode($rows);
}
else if(!isset($_GET['category_id'])&&(!isset($_GET['keyword']))&&(isset($_GET['date']))){
    $sales = new Sales();
    $rows = $sales->fetchAllDate($_GET['date']);
    echo json_encode($rows);
}
else if(!isset($_GET['category_id'])&&(isset($_GET['keyword']))&&(!isset($_GET['date']))){
    $sales = new Sales();
    $rows = $sales->searchsales($_GET['keyword']);
    echo json_encode($rows);
}
else if(!isset($_GET['category_id'])&&(isset($_GET['keyword']))&&(isset($_GET['date']))){
    $sales = new Sales();
    $rows = $sales->fetchAllDateAndKeyword($_GET['date'],$_GET['keyword']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(!isset($_GET['keyword']))&&(!isset($_GET['date']))){
    $sales = new Sales();
    $rows = $sales->fetchById($_GET['category_id']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(!isset($_GET['keyword']))&&(isset($_GET['date']))){
    $sales = new Sales();
    $rows = $sales->fetchAllDateAndId($_GET['date'],$_GET['category_id']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(isset($_GET['keyword']))&&(!isset($_GET['date']))){
    $sales = new Sales();
    $rows = $sales->searchsales($_GET['keyword'],$_GET['category_id']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(isset($_GET['keyword']))&&(isset($_GET['date']))){
    $sales = new Sales();
    $rows = $sales->fetchAllCondition($_GET['date'],$_GET['category_id'],$_GET['keyword']);
    echo json_encode($rows);
}