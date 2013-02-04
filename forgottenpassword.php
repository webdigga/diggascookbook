<?

// CONNECT TO DATABASE
include('dbconnect.php');

// SETUP VARIABLES FROM POST ARRAY
$email=$_POST['usremail'];

// GET DATA FROM DATABASE
$passwordRem = mysql_query("SELECT * from members WHERE email = '$email'");
    while($row = mysql_fetch_array($passwordRem)){        
        $pass=$row['password'];
        $email=$row['email'];
				$firstname=$row['firstname'];				
    }    
    $firstnameUpper=ucfirst($firstname);

// SEND EMAIL WITH DETAILS IN
$to      = $email;
$subject = 'Diggas Cook Book access details';
$message = "Hello $firstnameUpper!\r\rYou have received this email because a request has been made from the site to send a reminder of your password.  If you did not request this, then please contact $siteEmail immediately.\r\rEmail: $email \rPassword: $pass\r\rIf you are still having problems logging in then please contact us at $siteEmail";
$headers = 'From:'. $siteEmail . "\r\n" .
    'Reply-To:'. $siteEmail . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

// ECHO SUCCESS MESSAGE
if($pass) {
    header( 'Location: login-register.php?nav=login-register&flag=reminder' ) ;
}else{
    header( 'Location: login-register.php?nav=login-register&error=2' ) ;
}

?>