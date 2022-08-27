<?php
include '../database/Product.php';
include 'Redirection.php';
include '../service/upload.php';
$product = new Product();

if (isset($_POST)) {
    if ($_POST['table'] === 'product') {

        if ($_POST['form_action'] === 'update') {

            $product->update($_POST);

            //redirection('aaa.php');
        } else if ($_POST['form_action'] === 'delete') {

            $product->delete($_POST['product_id']);
            
        } else if ($_POST['form_action'] === 'insert') {

            if (!empty($_FILES['product_img1'])) {
                $path = './file/product/image1/';
                $filesname = uploadImage($_FILES['product_img1'],".".$path);
                if ($filesname) {
                    $_POST['product_img1'] = $path.$filesname;
                } else {
                    $_POST['product_img1'] = '';
                }
            } else {
                $_POST['product_img1'] = '';
            }


            if (!empty($_FILES['product_img2'])) {
                $path = './file/product/image2/';
                $filesname = uploadImage($_FILES['product_img2'], ".".$path);
                if ($filesname) {
                    $_POST['product_img2'] = $path.$filesname;
                } else {
                    $_POST['product_img2'] = '';
                }
            } else {
                $_POST['product_img2'] = '';
            }

            if (empty($_POST['sales_status'])) {

                $_POST['sales_status'] = '0';
            } else {
                $_POST['sales_status'] = '1';
            }
            $product->insert($_POST); 
            header( "location: ../productresult.php" );
        }
    }
} else {
    echo "Page Not found.";
}
