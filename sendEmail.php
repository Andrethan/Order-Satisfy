<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "C:/xampp/htdocs/Andrew/Sailor/PHPMailer-master/src/PHPMailer.php";
    require "C:/xampp/htdocs/Andrew/Sailor/PHPMailer-master/src/Exception.php";

    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    $mail->isHTML(true); 

    $name = $_POST["name"];
    $email = $_POST["email"];
	$text = $_POST["text"];

    /*$mail->Host = 'ssmtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'darksoulatme03@gmail.com';
    $mail->Password = 'textyrpak2003';
    $mail->SMTPSecure = 'ss1';
    $mail->Port = 465;*/

    $body = $name . ' ' . $email. ' ' . $text;
    $theme = "[Заявка с формой]";
    $mail->addAddress('areyousureaboutit@gmail.com');

    $mail->Subject = $theme;
    $mail->Body = $body;

    if (!$mail->send()) {
        $message = "Ошибка отправки";
    } else {
        $message = "Данные отправлены!";
    }
?>