<?

// database connect
require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');

/* ready in */
$readyInLabel = '';
$readyIn = mysql_query("SELECT tag, id FROM tags WHERE tag_category_id = 1");
while ($row = mysql_fetch_array($readyIn)) {
	$readyInName = str_replace(' ', '', strtolower($row['tag']));
	$readyInLabel.= "<label for=". $readyInName .">". $row['tag'] ." <input type=\"checkbox\" id=". $readyInName ." name=\"readyIn[]\" value=". $row['id']." /></label>";
}

/* courses  */
$coursesLabel = '';
$courses = mysql_query("SELECT tag, id FROM tags WHERE tag_category_id = 2");
while ($row = mysql_fetch_array($courses)) {
	$coursesName = str_replace(' ', '', strtolower($row['tag']));
	$coursesLabel.= "<label for=". $coursesName .">". $row['tag'] ." <input type=\"checkbox\" id=". $coursesName ." name=\"courses[]\" value=". $row['id']." /></label>";
}

/* special diet */
$specialDietLabel = '';
$specialDiet = mysql_query("SELECT tag, id FROM tags WHERE tag_category_id = 3");
while ($row = mysql_fetch_array($specialDiet)) {
	$specialDietName = str_replace(' ', '', strtolower($row['tag']));
	$specialDietLabel.= "<label for=". $specialDietName .">". $row['tag'] ." <input type=\"checkbox\" id=". $specialDietName ." name=\"specialDiet[]\" value=". $row['id']." /></label>";
}

/* cuisines */
$cuisinesLabel = '';
$cuisines = mysql_query("SELECT tag, id FROM tags WHERE tag_category_id = 4");
while ($row = mysql_fetch_array($cuisines)) {
	$cuisinesName = str_replace(' ', '', strtolower($row['tag']));
	$cuisinesLabel.= "<label for=". $cuisinesName .">". $row['tag'] ." <input type=\"checkbox\" id=". $cuisinesName ." name=\"cuisine[]\" value=". $row['id']." /></label>";
}
?>

<h2>Add a Recipe!</h2>

<form id="add-recipe" class="clearfix" action="/assets/cookbook/insert-recipe.php" method="POST" enctype="multipart/form-data">

	<label for "title">Title</label>
	<div class="help-text">(Enter the title of your recipe here, try to keep it short and decriptive, e.g. "Lasagne Al Forno")</div>
	<input type="text" value="" name="title" class="placeholder" title="&lt;Recipe name&gt;" />

	<label for "description">Description</label>
	<div class="help-text">(A short paragraph that details what this recipe is or what would you have with it, e.g. "A Spicy warm hearty broth....." )</div>
	<textarea name="description" rows="5" class="placeholder" title="&lt;Description&gt;"></textarea>

	<label for "ingredient">Ingredients</label>
	<div class="help-text">(List your ingredients out here, use the '+' symbol on the right to add more ingredients, try to use simple measurements such as grams, ml etc, e.g. "2 tbsp dry sherry" or "2 garlic cloves, crushed")</div>
	<textarea type="text" value="" name="ingredient[]" class="placeholder addition ingredient" title="&lt;Ingredient name and measurement&gt;" rows="3"></textarea>
	<div class="add-button ingred">
		<div class="plus">+</div>
		<div class="minus">-</div>
	</div>

	<label for "preparation">Preparation</label>
	<div class="help-text">(List point by point the methods used to prepare the meal, use the '+' symbol on the right to add more preparation items, e.g. "Put the pork fillet in a bowl and pour over the soy sauce and sherry" or "Preheat the oven to 200C/400F/Gas 6")</div>
	<textarea type="text" value="" name="preparation[]" class="placeholder addition preparation" title="&lt;Step 1&gt;" rows="3"></textarea>
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
	<input type="text" value="" name="serves" class="placeholder" title="&lt;Serves&gt;" />

	<label for "preparations-time">Preparation Time</label>
	<div class="help-text">(This is the time it takes to prepare the ingredients, such as chopping, peeling, mixing etc, e.g. "30 mins to 1 hour")</div>
	<input type="text" value="" name="preparation-time" class="placeholder" title="&lt;Preparation Time&gt;" />

	<label for "cooking-time">Cooking Time</label>
	<div class="help-text">(This is the time it takes to cook the meal, such as time spent in the oven or time to simmer in the pan etc, e.g. "10 to 30 mins")</div>
	<input type="text" value="" name="cooking-time" class="placeholder" title="&lt;Cooking Time&gt;" />
	
	<label for "cooking-time">Image</label>
	<div class="help-text">(Say Cheese! The closer to 640px x 267, the better)</div>
	<input type="file" name="image" />	
	
	<input type="submit" name="submit" id="submit" value="Add Recipe" />

</form>