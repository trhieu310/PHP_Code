<?php

use PHPMailer\PHPMailer\PHPMailer;

require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail -> isSMTP();
        $mail -> CharSet = "utf-8";
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;

        $nguoigui = 'tr******99@gmail.com';
        $matkhau = 't******';
        $tennguoigui = 'Xin chao toi la UEIH';

        $mail -> Username = $nguoigui;
        $mail -> Password = $matkhau;
        $mail -> SMTPSecure = 'ssl';
        $mail -> Port = 465;
        $mail -> setFrom($nguoigui, $tennguoigui);

        $to = 'nthieu.17it1@vku.udn.vn';
        $to_name = "nthieu";

        $mail -> addAddress($to, $to_name);
        $mail -> isHTML(true);
        $mail -> Subject = 'Xin ngon tay';

        $noidung = "<b>Hey!</b><b>Finger???</b>";
        $mail -> Body = $noidung;
        $mail -> smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true,
            )
        ));
        $mail -> send();
        echo "Da gui !!";
    } catch (Exception $e) {
        echo "Loi: ", $mail -> ErrorInfo;
    }

?>
