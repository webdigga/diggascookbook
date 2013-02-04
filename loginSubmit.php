<?php
session_start();
include('dbconnect.php');
//print_r($_POST);

$email=$_POST['usremail'];
$password=$_POST['password'];
$sql="SELECT * FROM members WHERE email = '$email' AND password = '$password'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){    
	$id = $row['id'];
	$email = $row['email'];
	$firstname = $row['firstname'];
	$surname = $row['surname'];
	$password = $row['password'];
}
$count = mysql_num_rows($result);

if($count==1) {	
	$_SESSION['id']=$id;  
	$_SESSION['email']=$email;
	$_SESSION['firstname']=$firstname;
	$_SESSION['surname']=$surname;
	$_SESSION['password']=$password;      
	//echo "You are now logged in!";
	header( 'Location: index.php' ) ;		
	
}else{
  //echo "Failed to login!";
	header( 'Location: login-register.php?error=1' ) ;
}
?>