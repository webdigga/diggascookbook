<h2>Register</h2>

<form id="register" name="register" class="clearfix" action="registersubmit.php" method="post">

	<label for "title">First Name</label>
	<div class="help-text">Enter your first name here, this will be used on the site so everyone knows it's your recipe!</div>
	<input type="text" name="first-name" class="placeholder" title="&lt;First Name&gt;" />
	
	<label for "title">Surname</label>
	<div class="help-text">Enter your surname here, this will be used on the site so everyone knows it's your recipe!</div>
	<input type="text" name="surname" class="placeholder" title="&lt;Surname&gt;" />
	
	<label for "title">
		Email 
		<span class="email-error">* Please enter a valid email</span>
		<?
		if (isset($_GET['flag']) && $_GET['flag'] === 'email') {
		?>
		<span class="email-already-exists">** Email Already Exists</span>
		<?
		}		
		?>
	</label>
	<div class="help-text">This will be used as your login to the site</div>
	<input type="text" name="usremail" class="placeholder email" title="&lt;Email&gt;" />
	
	<label for "title">Password</label>
	<div class="help-text">Password must be between 5 and 15 characters</div>
	<input type="text" name="password" class="placeholder password" title="&lt;Password&gt;" />	
	
	<input type="submit" name="submit" value="Register" />

</form>