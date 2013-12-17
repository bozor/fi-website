<?php

// Start
session_start();

$ip=$_SERVER['REMOTE_ADDR'];
$ua=$_SERVER['HTTP_USER_AGENT'];

// Set Mailer Options
$mail_from = "website@test";
$mail_to = "bozor@btinternet.com ";

$message = "Hello,\nA user has contacted you through the website.\n\nThis is an automated email, please do not reply to it.\n\n";

$form_name = $_POST['form-name'];

$message .= "Name: " . $_POST['form-name'] . "\n";
$message .= "Email: " . $_POST["form-email"] . "\n";
if( isset($_POST["form-phone"]) && $_POST["form-phone"] != "" ) {
	$message .= "Phone: " . $_POST["form-phone"] . "\n";
}

switch($_POST["form-enquiry"]){
	case 'a':
		$mail_subject = "Contact from website - Sales Query";
		if( isset($_POST["form-company"]) && $_POST["form-company"] != "" ) {
			$message .= "Company: " . $_POST["form-company"] . "\n";
		}
		if( isset($_POST["form-country"]) && $_POST["form-country"] != "" ) {
			$message .= "Country: " . $_POST["form-country"] . "\n";
		}
		if( isset($_POST["form-message"]) && $_POST["form-message"] != "" ) {
			$message .= "Message: " . $_POST["form-message"] . "\n";
		}
		break;
	case 'b':
		$mail_subject = "Contact from website - Technical Query";
		if( isset($_POST["form-message"]) && $_POST["form-message"] != "" ) {
			$message .= "Message: " . $_POST["form-message"] . "\n";
		}
		break;
	case 'c':
		$mail_subject = "Contact from website - Support Query";
		if( isset($_POST["form-serial"]) && $_POST["form-serial"] != "" ) {
			$message .= "Serial No: " . $_POST["form-serial"] . "\n";
		}
		if( isset($_POST["form-product"]) && $_POST["form-product"] != "" ) {
			$message .= "Product: " . $_POST["form-product"] . "\n";
		}
		if( isset($_POST["form-message"]) && $_POST["form-message"] != "" ) {
			$message .= "Message: " . $_POST["form-message"] . "\n";
		}
		$mail_to = "bozor@btinternet.com , support@temp";
		break;
	default:
		$mail_subject = "Contact from website - General Query";
		break;
}

$message .= "Human Test (for spam prevention only, please ignore): " . $_SESSION['x'] ." x " . $_SESSION['y'] ." = ". $_POST["control"] . "(".$_SESSION['answer'].")";
$headers = "From: $mail_from" . "\n" . "Reply-To: $mail_from" . "\n" . "X-Mailer: PHP/" . phpversion();

if ( isset($_SESSION['answer']) && !empty($_SESSION['answer'])  && ( $_POST['control'] == $_SESSION['answer'] ) ){

	//echo "<strong>".$mail_subject."</strong>".$message;

	if ( mail($mail_to, $mail_subject, $message, $headers) ) {
		echo "<div class=\"success\"><h2>Thank you</h2><p>One of our representatives will be in touch shortly.</p></div>";
	} else {
		echo "<div class=\"error\"><h2>Error</h2><p>We are sorry but something went wrong. Please try again later.</p></div>";
	}
} else {

	$mail_to = "bozor@btinternet.com";
	$mail_subject = "Contact from website - Bot/Script";
	$message = "Bot/scripting attempt - ( " . $_POST["control"] ." / ". $_SESSION['answer'] ." )!\n-----------------------------------\n\n ip: ".$ip."\n user agent: ".$ua."\n\n".$message;
	mail($mail_to, $mail_subject, $message, $headers);

}

?>

