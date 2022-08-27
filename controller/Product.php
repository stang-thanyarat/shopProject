<?php
include '../database/Product.php';
include 'Redirection.php';
include '../service/upload.php';
$product = new Product();

if (isset($_POST)) {
    if ($_POST['table'] === 'product') {

        if ($_POST['form_action'] === 'update') {
            //เชคการอัพโหลดรูป
            if (isset($_FILES['product_img1'])) {
                $path = './file/product/image1/';
                if (file_exists($_POST['product_img1'])) {
                    unlink($_POST['product_img1']);
                }
                $filesname = uploadImage($_FILES['product_img1'],".".$path);
                if ($filesname) {
                    $_POST['product_img1'] = $path.$filesname;
                } else {
                    $_POST['product_img1'] = '';
                }
            }
            if (isset($_FILES['product_img2'])) {
                $path = './file/product/image2/';
                if (file_exists($_POST['product_img2'])) {
                    unlink($_POST['product_img2']);
                }
                $fliename = $path.uploadImage($_FILES['product_img2'], ".".$path);
                if ($filesname) {
                    $_POST['product_img2'] = $path.$filesname;
                } else {
                    $_POST['product_img2'] = '';
                }
            }
            if (empty($_POST['sales_status'])) {

                $_POST['sales_status'] = '0';
            } else {
                $_POST['sales_status'] = '1';
            }

            if (empty($_POST['set_n_amt'])) {

                $_POST['set_n_amt'] = '0';
            } else {
                $_POST['set_n_amt'] = '1';
            }
            $product->update($_POST);

            redirection('../productresult.php');
        } else if ($_POST['form_action'] === 'delete') {
            $product->delete($_POST['product_id']);
            
        } else if ($_POST['form_action'] === 'insert') {

            if (isset($_FILES['product_img1'])) {
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


            if (isset($_FILES['product_img2'])) {
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

            if (empty($_POST['set_n_amt'])) {

                $_POST['set_n_amt'] = '0';
            } else {
                $_POST['set_n_amt'] = '1';
            }
            $product->insert($_POST); 
            header( "location: ../productresult.php" );
        }
    }
} else {
    echo "Page Not found.";
}
