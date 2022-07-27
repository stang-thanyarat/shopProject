<?php
include 'database/Form.php';
$form = new Form();
var_dump( $form->fetchById(3) );
