<?php
include_once 'config.php';
include_once 'sql.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'utils\vendor\autoload.php';

$errorMsg = "";
$mail = new PHPMailer(true);

if(!isset($_POST['submitCode'])) //jei forma uzpildyta teisingai
{
    $generatedCode = rand(1000, 9999); 
    $_SESSION['authCode'] = $generatedCode;

    try {
        //Server settings
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );
        //$mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP(); 
        $mail->SMTPSecure = "tls";                                           // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 // Enable SMTP authentication
        $mail->Username   = "nt.noreply537@gmail.com";                     // SMTP username
        $mail->Password   = '$7Nft#P`';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('nt.noreply537@gmail.com', 'nt 2fa');     
        $mail->addAddress('kaziliunaslukas@gmail.com');               // Name is optional// Add a recipient
        $mail->addReplyTo('nt.noreply537@gmail.com', 'Information');

    
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'autentifikavimo kodas';
        $mail->Body    = "tai jūsų autentifikavimo kodas: <b>$generatedCode</b>";
        //$mail->AltBody = "tai jūsų autentifikavimo kodas: $generatedCode";
    
        $mail->send();
        echo "<div class='alert alert-info' role='alert'> jūsų patvirtinimo kodas buvo išsiūstas į {$_SESSION['email']} </div>";
    } catch (Exception $e) {
       // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

    }
        $mail->smtpClose();

    include 'users/templates/confirmCode_form.php'; 
}
else{
    if($_POST['code'] == $_SESSION['authCode'])
    {
    $query = "UPDATE client SET password = '{$_SESSION['newPass']}' WHERE id = {$_SESSION['id']}";
    mysql::query($query);
    header("Location:" .ROOT. "/index.php?success=slaptažodis pakeistas");
    die();
    }
    else{
        $errorMsg = "kodas neteisingas";
        include 'users/templates/confirmCode_form.php'; 
    }
}

?>