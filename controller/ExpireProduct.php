<?php
include_once('../database/OrderDetails.php');
//กรณีที่ 1 ถ้าไม่ค้นหาทั้งจาก keyword และ ตัวเลือกประเภทสินค้า จะโชว์ทั้งหมด
if (!isset($_GET['category_id']) && (!isset($_GET['keyword'])) && (!isset($_GET['date']))) {
    $orderdetail = new OrderDetails();
    $rows = $orderdetail->fetchAll();
    echo json_encode($rows);
} else if (!isset($_GET['category_id']) && (!isset($_GET['keyword'])) && (isset($_GET['date']))) {
    $orderdetail = new OrderDetails();
    $rows = $orderdetail->fetchAllDate($_GET['date']);
    echo json_encode($rows);
} else if (!isset($_GET['category_id']) && (isset($_GET['keyword'])) && (!isset($_GET['date']))) {
    $orderdetail = new OrderDetails();
    $rows = $orderdetail->searchsales($_GET['keyword']);
    echo json_encode($rows);
} else if (!isset($_GET['category_id']) && (isset($_GET['keyword'])) && (isset($_GET['date']))) {
    $orderdetail = new OrderDetails();
    $rows = $orderdetail->fetchAllDateAndKeyword($_GET['date'], $_GET['keyword']);
    echo json_encode($rows);
} else if (isset($_GET['category_id']) && (!isset($_GET['keyword'])) && (!isset($_GET['date']))) {
    $orderdetail = new OrderDetails();
    $rows = $orderdetail->fetchById($_GET['category_id']);
    echo json_encode($rows);
} else if (isset($_GET['category_id']) && (!isset($_GET['keyword'])) && (isset($_GET['date']))) {
    $orderdetail = new OrderDetails();
    $rows = $orderdetail->fetchAllDateAndId($_GET['date'], $_GET['category_id']);
    echo json_encode($rows);
} else if (isset($_GET['category_id']) && (isset($_GET['keyword'])) && (!isset($_GET['date']))) {
    $orderdetail = new OrderDetails();
    $rows = $orderdetail->searchsales($_GET['keyword'], $_GET['category_id']);
    echo json_encode($rows);
} else if (isset($_GET['category_id']) && (isset($_GET['keyword'])) && (isset($_GET['date']))) {
    $orderdetail = new OrderDetails();
    $rows = $orderdetail->fetchAllCondition($_GET['date'], $_GET['category_id'], $_GET['keyword']);
    echo json_encode($rows);
}