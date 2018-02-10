<?php

require_once __DIR__ . '/../includes/PHPMailer-6.0.1/src/PHPMailer.php';
require_once __DIR__ . '/../includes/PHPMailer-6.0.1/src/Exception.php';
require_once __DIR__ . '/../includes/PHPMailer-6.0.1/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail{

  const USER = '';
  const PASSWORD = '';
  const HOST = '';
  const PORT = 465;
  const NAME = '';

  private $mail;

  function __construct(){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = self::USER;
    $mail->Password = self::PASSWORD;
    $mail->Host = self::HOST;
    $mail->Port = self::PORT;
    $mail->From = self::USER;
    $mail->FromName = self::NAME;
    $this->mail = $mail;
  }

  public function header($address, $subject){
    $this->mail->addAddress($address);
    $this->mail->Subject = $subject;
  }

  public function addBody($body){
    $this->mail->isHTML(true);
    $this->mail->Body = $body;
  }

  public function attachFile($file, $name){
    $this->mail->AddAttachment($file, $name);
  }

  public function send(){
    $this->mail->send();
  }

}




?>
