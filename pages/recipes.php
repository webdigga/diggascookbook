<?

// database connect
require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');

// lets see if we have a recipe id, if not, let's go to the recipe landing page
if(isset($_GET['recipeid'])) {
	$recipeid = $_GET['recipeid'];
} else {
	$recipeid = 0;	
}

// select the data and set the variables
$recipeSql = mysql_query("SELECT title, description, serves, preparationtime, cookingtime FROM recipes WHERE id='". $recipeid ."'");
while ($row = mysql_fetch_array($recipeSql)) {
	$recipeTitle = $row['title'];
	$recipeDescription = $row['description'];
	$recipeServes = $row['serves'];
	$recipePreparationTime = $row['preparationtime'];
	$recipeCookingTime = $row['cookingtime'];
}

// grab the image location
$imageSql = mysql_query("SELECT imagelocation FROM images WHERE recipeid='". $recipeid ."'");
while ($row = mysql_fetch_array($imageSql)) {
	$recipeImage = $row['imagelocation'];
}

// grab the ingredients
$ingredientsSql = mysql_query("SELECT ingredient FROM ingredients WHERE recipeid='". $recipeid ."'");
$recipeIngredients = '';
while ($row = mysql_fetch_array($ingredientsSql)) {
	$recipeIngredients.= "<li>".$row['ingredient']."</li>";
}

// grab the preparation methods
$preparationSql = mysql_query("SELECT preparation FROM preparation WHERE recipeid='". $recipeid ."'");
$recipePreparation = '';
while ($row = mysql_fetch_array($preparationSql)) {
	$recipePreparation.= "<li>".$row['preparation']."</li>";
}

// get the user who uploaded the recipe
$userSql = mysql_query("SELECT firstname, surname FROM members mem INNER JOIN recipes rec ON mem.id = rec.userkey WHERE rec.id='". $recipeid ."'");
$recipeUser = '';
while ($row = mysql_fetch_array($userSql)) {
	$recipeUser = $row['firstname']." ".$row['surname'];	
}


// comments
$comments = mysql_query("SELECT comment, datetime, mem.firstname AS firstname, mem.surname AS surname FROM comments com INNER JOIN recipes rec ON rec.id = com.recipeid INNER JOIN members mem ON mem.id = com.userkey WHERE rec.id=$recipeid ORDER BY datetime DESC LIMIT 4");
$num_rows = mysql_num_rows($comments);

$commentstable="";
if (isset($uid) && $num_rows==0) {
	$commentstable.="<p>Be the first to comment on this recipe!</p>";
	
} elseif($num_rows==0){
	$commentstable.="<p>Login and be the first to comment on this recipe!</p>";
} else {
	while($row = mysql_fetch_array($comments)){       
		$time=$row['datetime'];		
		$firstname=ucfirst($row['firstname']);
		$surname=ucfirst($row['surname']);
		$commentsname = $firstname."&nbsp;".$surname;
		$formattedDate= date("D G:i", strtotime($time));           
		$commentstable.="<p>".$row['comment']."<span>Comment by: ".$commentsname."</span><span>".$formattedDate."</span></p>";
	}
}

// rating
$result = mysql_query("SELECT ROUND(AVG (rating)) AS rating FROM rating WHERE recipeid = $recipeid");
while($row = mysql_fetch_array($result)) {
	$rate=$row['rating'];
}
switch ($rate) {
	case '1':
		$onecheck="checked";
		break;
	case '2':
		$twocheck="checked";
	break;
	case "3":
		$threecheck="checked";
	break;
	case '4':
		$fourcheck="checked";
	break;
	case '5':
		$fivecheck="checked";
	break;
}


if ($recipeid !=0) {
?>
<div class="grid_640">
	<input type="hidden" id="recipeid" value=<?=$recipeid;?> />
	<input type="hidden" id="userkey" value=<? if(isset($_SESSION['id'])) {echo $_SESSION['id'];}?> />
	<?php
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/recipes/image-and-description.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/recipes/ingredients.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/recipes/preparation.php');
	?>
</div>

<div class="grid_300">
	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/recipes/time-and-serves.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/recipes/comments.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/accordian/accordian.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/search/recipe-search.php');
	?>	
</div>
<?
} else {
?>
<div class="grid_640">
	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/tag-cloud/tag-cloud.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/twitter/twitter.php');
	?>
</div>

<div class="grid_300">
	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/accordian/accordian.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/search/recipe-search.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/adverts/mpu.php');
	?>
</div>
<?
}
?>