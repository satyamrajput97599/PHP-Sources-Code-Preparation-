<?php 

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_post['submit']))
{
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication


    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'thephoenixsatyam@gmail.com';                     //SMTP username
    $mail->Password   = 'ktgyochdsqhmvsgb';                               //SMTP password


    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('thephoenixsatyam@gmail.com', 'Satyam Chauhan');
    $mail->addAddress('thephoenixsatyam@gmail.com', 'Satyam of Web Mail');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Enquiry - Satyam Of Web Contact Form';
    $mail->Body    = '<h3>Hello, You got a new Enquiry</h3>
    <h4>Full Name : '.$name.' </h4>
    <h4>Email : '.$email.'</h4>
    <h4>Subject : '.$subject.'</h4>
    <h4>Message : '.$message.'</h4>
    ';

    if($mail->send())
    {
        $_SESSION['status'] = "Thank You Contact US - Team Satyam";
        header("Location : {$_SERVER['HTTP_REFERER']}");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header('Location : contact.php');
        exit(0);
    }

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}else{
    header('Location : contact.php');
    exit();
}
?>