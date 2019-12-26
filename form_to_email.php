<?php
$nameErr = $emailErr = $subjectErr = $messageErr = ""
$name = $email = $subject = $message = ""

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$nameErr = "Only letters and white space allowed";
		}
	}

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}

	if (empty($_POST["msg"])) {
		$messageErr = "Message is required";
	} else {
		$message = test_input($_POST["msg"]);
	}
} else {
	echo "error; you need to submit the form!";
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);	
	return $data;
}

$email_to = 'amy@lu-wang.com';
$email_body = "New email from %name.\n"
	"email address: $visitor_email\n"
	"Message: $message"

mail($email_to, $subject, $email_body);

?>
