<?php
include 'database/Form.php';
$Form = new Form();
var_dump($Form->fetchById(3));
?>