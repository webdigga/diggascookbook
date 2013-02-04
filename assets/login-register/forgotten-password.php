<h2>Reminder</h2>

<form id="forgotten-password" name="forgotten-password" class="clearfix" action="forgottenpassword.php" method="post">

	<label for "title">Email</label>
	<div class="help-text">Enter the email you signed up with</div>
	<input type="text" name="usremail" />	
	
	<? if(isset($_GET['error']) && $_GET['error']==='2') { ?>
	<div class="login-error">Email does not exist in our records</div>
	<? } ?>
	
	<input type="submit" name="submit" value="Email Me" />

</form>