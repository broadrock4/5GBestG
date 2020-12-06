
<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// If necessary, modify the path in the require statement below to refer to the
// location of your Composer autoload.php file.

$email = "tyburdick4@gmail.com";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$senderName = $_POST["submitterName"];
$bodyText = $_POST["contactText"];

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
$recipient = 'burdi009@cougars.csusm.edu';

// Replace smtp_username with your Amazon SES SMTP user name.
$usernameSmtp = 'AKIA5SL74TMRGVYINPN4';

// Replace smtp_password with your Amazon SES SMTP password.
$passwordSmtp = 'BJue2LyqV8sAcJTa+nMHeoNpO7H70DtgmMdMrYVPlEy+';

$host = 'email-smtp.us-east-2.amazonaws.com';
$port = 587;

// The subject line of the email
$subject = '5GBESTG Contact Us Form Submission';
 
$email_to = $recipient;
$fromserver = "burdi009@cougars.csusm.edu"; 
include "../phpmailer/vendor/autoload.php";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "email-smtp.us-east-2.amazonaws.com"; // Enter your host here
$mail->Username = "AKIA5SL74TMRGVYINPN4"; // Enter your email here
$mail->Password = "BJue2LyqV8sAcJTa+nMHeoNpO7H70DtgmMdMrYVPlEy+";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->From = $email;
$mail->FromName = $senderName;
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $bodyText;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<script language='javascript' type='text/javascript'>location.href='../Home/home.html'</script>";
 }


?>