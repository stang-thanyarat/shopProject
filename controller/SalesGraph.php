<?php
include_once('../database/SalesGraph.php');
if(isset($_GET['category_id'])&&(isset($_GET['date']))&&(isset($_GET['limit']))) {
    $salesgraph = new SalesGraph();
    $rows = $salesgraph->fetchAllDateAndId($_GET['category_id'], $_GET['date'], $_GET['limit']);
    echo json_encode($rows);
}
if(!isset($_GET['category_id'])&&(!isset($_GET['date']))&&(!isset($_GET['limit']))) {
    $salesgraph = new SalesGraph();
    $rows = $salesgraph->fetchAll();
    echo json_encode($rows);
}
