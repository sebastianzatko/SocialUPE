<?php
define('__ROOT__', dirname(dirname(__FILE__)));
use PHPMailer\PHPMailer\PHPMailer;
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/phpmailer/phpmailer/src/SMTP.php';
class changeromail2
{
    public function validaremail($to,$name,$codigo)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'mx1.hostinger.com.ar';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'changero@changero.online';
        $mail->Password = '6u]F0PnFnLJ4';
        $mail->setFrom('changero@changero.online', 'Changero Online');
        $mail->addReplyTo('changero@changero.online', 'Changero Online');
        $mail->addAddress($to, $name);
        $mail->Subject = 'SocialUPE - Invitacion';
        $body = file_get_contents(__ROOT__."/../templates/email_val2.html");
        
        
		$s_codigo="%codigo%";
		$n_val = trim(utf8_decode($codigo));
		$body = str_replace($s_codigo, $n_val, $body);
		
        //$mail->msgHTML(file_get_contents('email_val.html'), __DIR__);
        $mail->AltBody = 'This is a plain text message body';
        //$mail->addAttachment(''); 
        $mail->Body = $body;
        $mail->IsHTML(true);
        if (!$mail->send()) {
            return 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
}
//Descomentar las 2 lineas siguientes en caso de querer probar este modulo por separado, y volver a comentar luego de finalizar el test (hacerlo en commit).
//$s = new changeromail();
//$s->validaremail('diego.ba.rodriguez@gmail.com','Diego','http://www.google.com');
?>
