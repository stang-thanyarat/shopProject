<?php
include_once '../database/Sales.php';
include_once '../service/upload.php';
include_once '../database/SalesDetails.php';
include_once 'Redirection.php';
$salesdetails = new SalesDetails();
$sales = new Sales();
if (isset($_POST)) {
    if ($_POST['table'] === 'sales') {
        if ($_POST['form_action'] === 'update') {
            if ($_FILES['import_files']['size'] > 0) {
                $path = './file/sales/sales_slip/';
                if (file_exists($_POST['import_files'])) {
                    unlink($_POST['import_files']);
                }
                $filesname = $path.uploadImage($_FILES['import_files'], "." . $path);
                if ($filesname) {
                    $sales->updateimage('import_files',$filesname,$_POST['sales_list_id']);
                }
            }
            $sales->update($_POST);
            Redirection("/productlist.php");
            //redirection('aaa.php');
        } else if ($_POST['form_action'] === 'delete') {
            $sales->delete($_POST['sales_list_id']);
        } else if ($_POST['form_action'] === 'insert') {
            if ($_FILES['import_files']['size'] > 0) {
                $path = './file/sales/sales_slip/';
                $filesname = uploadImage($_FILES['import_files'], "." . $path);
                if ($filesname) {
                    $_POST['import_files'] = $path . $filesname;
                } else {
                    $_POST['import_files'] = '';
                }
            } else {
                $_POST['import_files'] = '';
            }
            $sales->insert($_POST);
        }
    }
} else {
    echo "Page Not found.";
}
?>
/*
if (isset($_POST)) {
if ($_POST['table'] === 'sales') {
if ($_POST['form_action'] === 'update') {
$details = json_decode($_POST['sales']);
$tempdetails = [];
foreach ($details as $b) {
$tempdetails[] = (array)$b;
}
$details = $tempdetails;

// remove and edit of salesdatails
$recBack = $salesdetails->fetchBySalesId($_POST['sales_list_id']);
foreach ($recBack as $r) {
$f = false;
foreach ($details as $value) {
$f = $f  || ($r['unique_id'] == $value['id']);
}
if (!$f) {
$salesdetails->delete($r['unique_id']);
} else {
$form = [];
$form['unique_id'] =  $r['unique_id'];
$form['sales_list_id'] =  $_POST['sales_list_id'];
$form['sales_dt'] = $value['date'];
$form['product_id'] =  $_POST['product'];
$form['sales_amt'] =  $value['amount'];
$form['sales_pr'] =  $value['price'];
$salesdetails->update($form);
}
}
// insert and edit of salesdatails
foreach ($details as $value) {
if ($value['id'] == -1) {
$form = [];
$form['sales_list_id'] =  $_POST['sales_list_id'];
$form['sales_dt'] = $value['date'];
$form['product_id'] = $_POST['product'];
$form['sales_amt'] =  $value['amount'];
$form['sales_pr'] =  $value['price'];
$salesdetails->insert($form);
}
}
$sales->update($_POST);
Redirection("/productlist.php");
//redirection('aaa.php');

} else if ($_POST['form_action'] === 'delete') {
$sales->delete($_POST['sales_list_id']);
} else if ($_POST['form_action'] === 'insert') {
$_POST['import_files'] = str_replace("-", "", $_POST['employee_card_id']);
$sales->insert($_POST);
$last = $sales->fetchLast();
$lastID = $last['sales_list_id'];
$details = json_decode($_POST['sales']);
foreach ($details as $value) {
$form = [];
$form['sales_list_id'] =  $_POST['sales_list_id'];
$form['sales_dt'] = $value['date'];
$form['product_id'] =  $value['product'];
$form['sales_amt'] =  $value['amount'];
$form['sales_pr'] =  $value['price'];
$salesdetails->insert($form);
}
$sales->insert($_POST);
redirection("/productlist.php");
}
}
} else {
echo "Page Not found.";
} */

