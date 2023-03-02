<?php
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
include_once '../../database/Product.php';

if (!isset($_SESSION)) {
    session_start();
};

if (!isset($_SESSION['sender_email'])) {
    $_SESSION['sender_email'] = "abc@gmail.com";
}
if (!isset($_SESSION['sender_password'])) {
    $_SESSION['sender_password'] = "xxxxxxxxxxx";
}
if (!isset($_SESSION['res_email'])) {
    $_SESSION['res_email'] = "abc@gmail.com";
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$product = new Product();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = $_SESSION['sender_email'];
$mail->Password = $_SESSION['sender_password'];
$mail->Subject = "รายงานสินค้าใกล้หมด";
$mail->setFrom($_SESSION['sender_email']);
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$body = '';
$lost = $product->fetchLost();
foreach ($lost as $row) {
    if ($row['product_rm_unit']>0) {
        $body .= $row['product_name'] . ' คงเหลือ ' . $row['product_rm_unit'] . " "
            . $row['product_unit'] . "<br/>";
    } else {
        $body .= $row['product_name'] . ' หมด '. "<br/>";
    }
}
$mail->Body = $body;
$mail->addAddress($_SESSION['res_email']);
if ($mail->send()) {
    echo "Email Sent..!";
} else {
    echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
    http_response_code(500);
}
$mail->smtpClose();
