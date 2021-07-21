<?php
set_include_path('../PHPMailer');
require_once 'PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();                             // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Set SMTP server
$mail->SMTPSecure = 'ssl';                   // Set encryption type
$mail->Port = 587;                           // Set TCP port
$mail->SMTPAuth = true;                      // Enable SMTP authentication
$mail->Username = 'trunghieu301999@gmail.com'; // Set SMTP username
$mail->Password = 't**********u';           // Set SMTP password

$mail->setFrom('nthieu.17it1@vku.udn.vn', 'John Doe');
$mail->addAddress('nthieu.17it1@vku.udn.vn', 'Jane Doe');
$mail->Subject = 'PHPMailer Test';
$mail->Body    = '<p>This body uses HTML to make text <b>bold!</b></p>';
$mail->AltBody = 'This body does not use HTML.';
$mail->isHTML(true);                        // Enable HTML formatting

if($mail->send()) {
    echo '<p>Message has been sent by PHPMailer.</p>';
} else {
    echo '<p>Message could not be sent by PHPMailer.</p>';
    echo '<p>Error: ' . $mail->ErrorInfo . '</p>';
}
