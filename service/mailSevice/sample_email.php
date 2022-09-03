<?php
header('Content-Type: text/html; charset=utf-8');
use PHPMailer\PHPMailer\PHPMailer;
include_once './phpmailer/src/PHPMailer.php';
include_once './phpmailer/src/SMTP.php';
include_once './phpmailer/src/Exception.php';

$mail = new PHPMailer();
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$sender = "Thanyarat"; // ชื่อผู้ส่ง
$email_receiver = "stangstang0508@gmail.com"; // เมล์ผู้รับ ***

$subject = "รายงานประจำวัน"; // หัวข้อเมล์

$email_sender= "padetsuek.2543@gmail.com";
$mail->oauthUserEmail = "padetsuek.2543@gmail.com";
$mail->oauthClientId = "177945959551-al6m9c80p26v3cvhf9j211g5an46umot.apps.googleusercontent.com";
$mail->oauthClientSecret = "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";
//$mail->oauthRefreshToken = "[Redacted]";
$mail->setFrom($email_sender, $sender);
$mail->addAddress($email_receiver);
$mail->Subject = $subject;

$email_content = "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset=utf-8'/>
			<title>ทดสอบการส่ง Email</title>
		</head>
		<body>
			<h1 style='background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
				<img src='http://pngimg.com/uploads/apple_logo/apple_logo_PNG19670.png' style='width: 80px;'>
				APPLE
			</h1>
			<div style='padding:20px;'>
				<div style='text-align:center;margin-bottom:50px;'>
					<img src='http://cdn.wccftech.com/wp-content/uploads/2017/02/Apple-logo.jpg' style='width:100%' />					
				</div>
				<div>				
					<h2>การกู้รหัสผ่าน สำหรับ Apple : <strong style='color:#0000ff;'></strong></h2>
					<a href='#' target='_blank'>
						<h1><strong style='color:#3c83f9;'> >> กรุณาคลิ๊กที่นี่ เพื่อตั้งรหัสผ่านใหม่<< </strong> </h1>
					</a>
				</div>
				<div style='margin-top:30px;'>
					<hr>
					<address>
						<h4>ติดต่อสอบถาม</h4>
						<p>Apple Thailand</p>
						<p>www.facebook.com/apple</p>
					</address>
				</div>
			</div>
			<div style='background: #3b434c;color: #a2abb7;padding:30px;'>
				<div style='text-align:center'> 
					2016 © Apple Thailand
				</div>
			</div>
		</body>
	</html>
";
$mail->msgHTML($email_content);
