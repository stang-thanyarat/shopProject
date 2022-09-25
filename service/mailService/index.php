<?php
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
include_once '../../database/Product.php';

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
$mail->Username = "padetsuek.2543@gmail.com";
$mail->Password = "ieqnooqspkkmzgxn";
$mail->Subject = "รายงานสินค้าใกล้หมด";
$mail->setFrom('padetsuek.2543@gmail.com');
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
$mail->addAddress('padetsuek.2543@gmail.com');
if ($mail->send()) {
    echo "Email Sent..!";
} else {
    echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
    http_response_code(500);
}
$mail->smtpClose();
