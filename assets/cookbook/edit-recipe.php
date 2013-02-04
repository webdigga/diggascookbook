<?

// database connect
require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');

// get the recipe id
$recipeid = $_GET['recipeid'];

// get the ready in tags array
$readyInDetails = mysql_query('SELECT rectag.tag_id as id FROM recipe_tags rectag INNER JOIN tags tag ON rectag.tag_id = tag.id WHERE tag.tag_category_id = 1 AND rectag.recipeid = '.$recipeid);
$readyInStack = array();
while ($row = mysql_fetch_array($readyInDetails)) {
	array_push($readyInStack, $row['id']);	
}
// get the courses tags array
$coursesDetails = mysql_query('SELECT rectag.tag_id as id FROM recipe_tags rectag INNER JOIN tags tag ON rectag.tag_id = tag.id WHERE tag.tag_category_id = 2 AND rectag.recipeid = '.$recipeid);
$coursesStack = array();
while ($row = mysql_fetch_array($coursesDetails)) {
	array_push($coursesStack, $row['id']);	
}
// get the special dies tags array
$specialDietDetails = mysql_query('SELECT rectag.tag_id as id FROM recipe_tags rectag INNER JOIN tags tag ON rectag.tag_id = tag.id WHERE tag.tag_category_id = 3 AND rectag.recipeid = '.$recipeid);
$specialDietStack = array();
while ($row = mysql_fetch_array($specialDietDetails)) {
	array_push($specialDietStack, $row['id']);	
}
// get the cuisines tags array
$cuisinesDetails = mysql_query('SELECT rectag.tag_id as id FROM recipe_tags rectag INNER JOIN tags tag ON rectag.tag_id = tag.id WHERE tag.tag_category_id = 4 AND rectag.recipeid = '.$recipeid);
$cuisinesStack = array();
while ($row = mysql_fetch_array($cuisinesDetails)) {
	array_push($cuisinesStack, $row['id']);	
}

/* ready in */
$readyInLabel = '';
$readyIn = mysql_query("SELECT tag, id FROM tags WHERE tag_category_id = 1");
while ($row = mysql_fetch_array($readyIn)) {
	if (in_array($row['id'], $readyInStack)) {
		$checked = "checked='checked'";
	} else {
		$checked = '';
	}
	$readyInName = str_replace(' ', '', strtolower($row['tag']));
	$readyInLabel.= "<label for=". $readyInName .">". $row['tag'] ." <input ". $checked ." type=\"checkbox\" id=". $readyInName ." name=\"readyIn[]\" value=". $row['id']." /></label>";
}
/* courses  */
$coursesLabel = '';
$courses = mysql_query("SELECT tag, id FROM tags WHERE tag_category_id = 2");
while ($row = mysql_fetch_array($courses)) {
	if (in_array($row['id'], $coursesStack)) {
		$checked = "checked='checked'";
	} else {
		$checked = '';
	}
	$coursesName = str_replace(' ', '', strtolower($row['tag']));
	$coursesLabel.= "<label for=". $coursesName .">". $row['tag'] ." <input ". $checked ." type=\"checkbox\" id=". $coursesName ." name=\"courses[]\" value=". $row['id']." /></label>";
}
/* special diet */
$specialDietLabel = '';
$specialDiet = mysql_query("SELECT tag, id FROM tags WHERE tag_category_id = 3");
while ($row = mysql_fetch_array($specialDiet)) {
	if (in_array($row['id'], $specialDietStack)) {
		$checked = "checked='checked'";
	} else {
		$checked = '';
	}
	$specialDietName = str_replace(' ', '', strtolower($row['tag']));
	$specialDietLabel.= "<label for=". $specialDietName .">". $row['tag'] ." <input ". $checked ." type=\"checkbox\" id=". $specialDietName ." name=\"specialDiet[]\" value=". $row['id']." /></label>";
}
/* cuisines */
$cuisinesLabel = '';
$cuisines = mysql_query("SELECT tag, id FROM tags WHERE tag_category_id = 4");
while ($row = mysql_fetch_array($cuisines)) {
	if (in_array($row['id'], $cuisinesStack)) {
		$checked = "checked='checked'";
	} else {
		$checked = '';
	}
	$cuisinesName = str_replace(' ', '', strtolower($row['tag']));
	$cuisinesLabel.= "<label for=". $cuisinesName .">". $row['tag'] ." <input ". $checked ." type=\"checkbox\" id=". $cuisinesName ." name=\"cuisine[]\" value=". $row['id']." /></label>";
}

// get basic recipe details
$recipeDetails = mysql_query('SELECT * FROM recipes WHERE id = '.$recipeid);
while ($row = mysql_fetch_array($recipeDetails)) {
	$title = $row['title'];
	$description = $row['description'];
	$serves = $row['serves'];
	$preparationtime = $row['preparationtime'];
	$cookingtime = $row['cookingtime'];
}
// get the ingredients
$ingredientsDetails = mysql_query('SELECT * FROM ingredients WHERE recipeid = '.$recipeid);
$ingredient = '';
while ($row = mysql_fetch_array($ingredientsDetails)) {
	$ingredient.= "<textarea type=\"text\" name=\"ingredient[]\" class=\"addition ingredient\" rows=\"3\">". $row['ingredient']. "</textarea>";
}
// get the preparations
$preparationDetails = mysql_query('SELECT * FROM preparation WHERE recipeid = '.$recipeid);
$preparation = '';
while ($row = mysql_fetch_array($preparationDetails)) {
	$preparation.= "<textarea type=\"text\" name=\"preparation[]\" class=\"addition preparation\" rows=\"3\">". $row['preparation']. "</textarea>";
}
// get the image
$imageDetails = mysql_query('SELECT imagelocation FROM images WHERE recipeid = '.$recipeid);
while ($row = mysql_fetch_array($imageDetails)) {
	$imageLocation = $row['imagelocation'];
}


?>

<h2>Edit a Recipe!</h2>

<form id="add-recipe" class="clearfix edit-recipe" action="/assets/cookbook/update-recipe.php" method="POST" enctype="multipart/form-data">

	<label for "title">Title</label>
	<div class="help-text">(Enter the title of your recipe here, try to keep it short and decriptive, e.g. "Lasagne Al Forno")</div>
	<input type="text" name="title" value="<?=$title;?>" />

	<label for "description">Description</label>
	<div class="help-text">(A short paragraph that details what this recipe is or what would you have with it, e.g. "A Spicy warm hearty broth....." )</div>
	<textarea name="description" rows="5"><?=$description;?></textarea>

	<label for "ingredient">Ingredients</label>
	<div class="help-text">(List your ingredients out here, use the '+' symbol on the right to add more ingredients, try to use simple measurements such as grams, ml etc, e.g. "2 tbsp dry sherry" or "2 garlic cloves, crushed")</div>
	<?=$ingredient;?>
	<div class="add-button ingred">
		<div class="plus">+</div>
		<div class="minus">-</div>
	</div>

	<label for "preparation">Preparation</label>
	<div class="help-text">(List point by point the methods used to prepare the meal, use the '+' symbol on the right to add more preparation items, e.g. "Put the pork fillet in a bowl and pour over the soy sauce and sherry" or "Preheat the oven to 200C/400F/Gas 6")</div>
	<?=$preparation;?>
	<div class="add-button prep">
		<div class="plus">+</div>
		<div class="minus">-</div>
	</div>
	
	<label for "cooking-time">Tag me!</label>
	<div class="help-text">(Click the button below to open a list of possible tags to help categorise your recipe.  This will make it easier for others to find your recipes and help keep it relevant)</div>
	
	<button type="button">Tags</button>		
	
	<div id="tag-recipe" title="Tag your recipe here!">
		<p>Adding tags makes it easy for other people to find your recipes from the tag cloud.</p>		
		<fieldset id="advanced-tagging" style="overflow: hidden; ">	             
			<fieldset id="ready-in">
				<h5>Ready in...</h5>
				<?=$readyInLabel;?>
			</fieldset>
			<fieldset id="courses">
				<h5>Courses</h5>
				<?=$coursesLabel;?>
			</fieldset>
			<fieldset id="diets">
				<h5>Special diets</h5>
				<?=$specialDietLabel;?>
			</fieldset>
			<fieldset id="cuisines">
				<h5>Cuisines</h5>
				<?=$cuisinesLabel;?>
			</fieldset>
		</fieldset>
	</div>
	<div id="tag-recipe-holder" style="display: none;">
	</div>
	<label for "serves">Serves</label>
	<div class="help-text">(Simply enter here the number of people the ingredients you have listed are supposed to serve, e.g. "4")</div>
	<input type="text" name="serves" value="<?=$serves;?>" />

	<label for "preparations-time">Preparation Time</label>
	<div class="help-text">(This is the time it takes to prepare the ingredients, such as chopping, peeling, mixing etc, e.g. "30 mins to 1 hour")</div>
	<input type="text" name="preparation-time" value="<?=$preparationtime;?>" />

	<label for "cooking-time">Cooking Time</label>
	<div class="help-text">(This is the time it takes to cook the meal, such as time spent in the oven or time to simmer in the pan etc, e.g. "10 to 30 mins")</div>
	<input type="text" name="cooking-time" value="<?=$cookingtime;?>" />
	
	<label for "cooking-time">Image</label>
	<div class="help-text">(Say Cheese! The closer to 640px x 267, the better, Leave blank if you are happy with the current image displayed here :-)</div>
	
	<img src="<?=$imageLocation;?>" class="teaser-image" title="teaser image" alt="teaser image" width="200px" height="100px" />
	
	<input type="file" name="image" />

	<input type="hidden" name="recipeid" value="<?=$recipeid;?>" />
	
	<input type="submit" name="submit" id="submit" value="Edit Recipe" />

</form>