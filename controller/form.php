<?php
include 'database/Form.php';
$form = new Form();
if(isset($_POST)){
    if(isset($_POST['id'])){
        $form->update($_POST);
    }else{
        $form->insert($_POST);
    }
}