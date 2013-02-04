<?

// TODO - serverside validation

// CONNECT TO DATABASE
include('dbconnect.php');
//print_r($_POST);

// SETUP VARIABLES FROM POST ARRAY
$firstname=$_POST['first-name'];
$lastname=$_POST['surname'];
$email=$_POST['usremail'];
$password=$_POST['password'];

// check here to see if email already exists
$checkEmail = "SELECT * FROM members WHERE email = '$email'";

$emailCount = mysql_num_rows(mysql_query($checkEmail));

if ($emailCount === 0) {
	
	// INSERT NEW MEMBER INTO DATABASE
	$sql="INSERT INTO members (firstname, surname, email, password) VALUES ('$firstname','$lastname','$email','$password')";
	mysql_query($sql);

	// EMAIL NEW MEMBER THEIR DETAILS
	$to      = "$email";
	$subject = 'Diggas Cook Book access details';
	$message = "Hello $firstname!\r\rWelcome to Diggas Cook Book.  Below are your access details so you can make comments, add recipes of your own, and more!\r\rUsername: $email \rPassword: $password\r\rThanks from everybody at Diggas Cook Book";
	$headers = "From: $siteEmail\n";
	$headers .= "Reply-To: $siteEmail\n";
	$headers .= "Bcc: $siteEmail\n";	
	$headers .= "X-Mailer: PHP\n";		
	$headers .= "Return-Path: $siteEmail\n";
	mail($to, $subject, $message, $headers);

	header( 'Location: index.php?nav=home&flag=register' ) ;
	
} else {
	header( 'Location: /login-register.php?nav=loginregister&flag=email' ) ;
}