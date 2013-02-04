<h2>Login</h2>

<form id="login" name="login" class="clearfix" action="loginSubmit.php" method="post">

	<label for "title">Email</label>
	<div class="help-text">Enter the email you signed up with</div>
	<input type="text" name="usremail" />
	
	<label for "title">Password</label>
	<div class="help-text">Password must be between 5 and 15 characters</div>
	<input type="password" name="password" />
	
	<? if(isset($_GET['error']) && $_GET['error']==='1') { ?>
	<div class="login-error">Incorrect email or password, please try again</div>
	<? } ?>
	
	<input type="submit" name="submit" value="Login" />

</form>