<?php
include_once('../database/SalesGraph.php');
$salesgraph = new SalesGraph();
$rows = $salesgraph->fetchAllDateAndId($_GET['date'], $_GET['category_id'],$_GET['limit']);
echo json_encode($rows);
