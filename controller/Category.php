<?php
include '../database/Category.php';
include 'Redirection.php';
$category = new Category();
if (isset($_POST)) {
    if ($_POST['table'] === 'category') {

        if ($_POST['form_action'] === 'update') {

            $category->update($_POST);

            //redirection('aaa.php');

        } else if ($_POST['form_action'] === 'delete') {

            $category->delete($_POST['category_id']);
        } else if ($_POST['form_action'] === 'insert') {

            $category->insert($_POST);
            //header( "location: ../category.php" );
        }
    }
}
else{
    echo "Page Not found.";
}
?>