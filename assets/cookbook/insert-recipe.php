<?php

// database connect
require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');

// grab the userkey
session_start();
$userkey = $_SESSION['id'];

// TODO server-side validation

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<pre>";
print_r($_FILES);
echo "</pre>";
*/


//define a maximum size for the uploaded images in Kb
define ("MAX_SIZE","1000");

//This function reads the extension of the file. It is used to determine if the file is an image by checking the extension.
function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

// This variable is used as a flag. The value is initialized with 0 (meaning no error found) and it will be changed to 1 if an error occures. If the error occures the file will not be uploaded.
$errors=0;
//checks if the form has been submitted
if(isset($_POST['submit'])){
	//reads the name of the file the user submitted for uploading
	$image=$_FILES['image']['name'];
	//if it is not empty
	if ($image){
		//get the original name of the file from the clients machine
		$filename = stripslashes($_FILES['image']['name']);
		//get the extension of the file in a lower case format
		$extension = getExtension($filename);
		$extension = strtolower($extension);
		//if it is not a known extension, we will suppose it is an error and will not upload the file, otherwize we will do more tests
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
				//print error message
				echo '<h1>Unknown extension!</h1>';
				$errors=1;
		} else {
			//get the size of the image in bytes
			//$_FILES['image']['tmp_name'] is the temporary filename of the file in which the uploaded file was stored on the server
			$size=filesize($_FILES['image']['tmp_name']);
			//compare the size with the maxim size we defined and print error if bigger
			if ($size > MAX_SIZE*1024){
					echo '<h1>You have exceeded the size limit!</h1>';
					$errors=1;
			}
			//we will give an unique name, for example the time in unix time format
			$image_name=time().'.'.$extension;
			//the new name will be containing the full path where will be stored (img folder)
			$newname=$_SERVER['DOCUMENT_ROOT']."/img/recipes/".$image_name;
			//we verify if the image has been uploaded, and print error instead
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			if (!$copied){
					echo '<h1>Copy unsuccessfull!</h1>';
					$errors=1;
			}
		}
  }
}

//If no errors registered, do the inserts
if(isset($_POST['submit']) && !$errors) {

	// set variables
	$title=$_POST['title'];
	$description=addslashes($_POST['description']);
	$ingredient=$_POST['ingredient'];
	$preparation=$_POST['preparation'];
	$serves=$_POST['serves'];
	$preparationtime=$_POST['preparation-time'];
	$cookingtime=$_POST['cooking-time'];
	
	$image_name="/img/recipes/".$image_name;
	
	// insert the main data
	$recipeSql="INSERT INTO recipes (title, description, serves, preparationtime, cookingtime, userkey) VALUES ('$title', '$description', '$serves', '$preparationtime', '$cookingtime', $userkey)";
	mysql_query($recipeSql);

	// grab the insertid
	$insertId=mysql_insert_id();
	
	// insert the image
	$imageSql="INSERT INTO images (recipeid, imagelocation) VALUES ($insertId, '$image_name')";       
  mysql_query($imageSql);

	// loop through the ingredients and run a sql insert for each
	foreach ($_POST['ingredient'] as $key=>$value) {
		$ingredientSql="INSERT INTO ingredients (recipeid, ingredient) VALUES ($insertId, '$value')";
		mysql_query($ingredientSql);
	}

	// loop through the preparation steps and run a sql insert for each
	foreach ($_POST['preparation'] as $key=>$value) {
		$preparationSql="INSERT INTO preparation (recipeid, preparation) VALUES ($insertId, '$value')";
		mysql_query($preparationSql);
	}
	
	// loop through the ready in and run a sql insert for each
	foreach ($_POST['readyIn'] as $key=>$value) {
		$readyInSql="INSERT INTO recipe_tags (tag_id, recipeid) VALUES ('$value', $insertId)";
		mysql_query($readyInSql);
	}
	// loop through the courses and run a sql insert for each
	foreach ($_POST['courses'] as $key=>$value) {
		$coursesSql="INSERT INTO recipe_tags (tag_id, recipeid) VALUES ('$value', $insertId)";
		mysql_query($coursesSql);
	}
	// loop through the special diet and run a sql insert for each
	foreach ($_POST['specialDiet'] as $key=>$value) {
		$specialDietSql="INSERT INTO recipe_tags (tag_id, recipeid) VALUES ('$value', $insertId)";
		mysql_query($specialDietSql);
	}
	// loop through the cuisine and run a sql insert for each
	foreach ($_POST['cuisine'] as $key=>$value) {
		$cuisineSql="INSERT INTO recipe_tags (tag_id, recipeid) VALUES ('$value', $insertId)";
		mysql_query($cuisineSql);
	}	
	
	// take the user to the page where their recipe has just been added
	header( 'Location: /recipes.php?recipeid='.$insertId ) ;		
	
}


?>