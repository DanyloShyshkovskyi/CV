<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once '../assets/plugins/phpmailer/Exception.php';
require_once '../assets/plugins/phpmailer/PHPMailer.php';
require_once '../assets/plugins/phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';


  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $message = $_POST['message'];


  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lianshish808@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'ghzybr808'; // Gmail address Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';

    $mail->setFrom('lianshish808@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('lianshish808@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } catch (Exception $e){
    $ress['msg'] = "Thanks, I will get back to you ASAP";
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }

?>
