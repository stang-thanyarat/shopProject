<?php
include_once('../database/SalesGraph.php');
if(!isset($_GET['category_id'])&&(!isset($_GET['date']))){
    $salesgraph = new SalesGraph();
    $rows = $salesgraph->fetchAll();
    echo json_encode($rows);
}
else if(!isset($_GET['category_id'])&&(isset($_GET['date']))){
    $salesgraph = new SalesGraph();
    $rows = $salesgraph->fetchAllDate($_GET['date']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(!isset($_GET['date']))){
    $salesgraph = new SalesGraph();
    $rows = $salesgraph->fetchById($_GET['category_id']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(isset($_GET['date']))){
    $salesgraph = new SalesGraph();
    $rows = $salesgraph->fetchAllDateAndId($_GET['date'],$_GET['category_id']);
    echo json_encode($rows);
}