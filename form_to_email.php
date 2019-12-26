<?php
if(isset($_POST["submit"])){
	echo "error; you need to submit the form!";
}
function sanitize_my_email($field) {
	$field = filter_var($field, FILTER_SANITIZE_EMAIL);
	if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false; 
	}
}

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['msg'];

if(empty($name)||empty($email)){
	echo "Name and email are required.";
	exit;
}

$email_to = 'amy@lu-wang.com';
$email_body = "New email from %name.\n"
	"email address: $visitor_email\n"
	"Message: $message"

$secure_check = sanitize_my_email($visitor_email);
if ($secure_check == false) {
	echo "Invalid email";
} else {
	mail($email_to, $subject, $email_body);
}
?>
