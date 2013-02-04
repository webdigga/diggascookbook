<?php

// START SESSION AND GET FIRSTNAME OF LOGGED IN USER
session_start();

if (isset($_SESSION['id'])) {
	$uid = $_SESSION['id'];
	$fullname = $_SESSION['firstname']. ' ' .$_SESSION['surname'];
	$firstname = $_SESSION['firstname'];
	$firstname = ucfirst($firstname);
};
?>

<div class="diggas-dig ui-widget-header">
	<h1 class="diggascookbook">Diggascookbook</h1>
	<div class="dig-in">Dig In!</div>
</div>