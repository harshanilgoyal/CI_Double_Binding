<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'mailer/vendor/autoload.php';

function mailfun($pdfstring,$res,$sub,$mes){
  echo $res;
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->Port=465;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='ssl';
  $mail->Username='harsh.goyalsolar@gmail.com';
  $mail->Password='7588800097';
  $mail->SMTPDebug = 2;
  $mail->setFrom('harsh@goyalsolar.com', 'Harsh Goyal');
  $mail->addAddress('goyalharsh07@gmail.com', 'Harsh Goyal');
  $res_arr = explode (",", $res);
  foreach($res_arr as $x){
    echo $x;
  $mail->addAddress($x,$x);  
  }
  $mail->Subject  =''.$sub;
  $mail->Body     =''.$mes;
  $mail->AddStringAttachment($pdfstring, 'Proposal.pdf', 'base64', 'application/pdf');
  if(!$mail->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
  } else {
    echo 'Message has been sent.';
  }
}
?>
