<?

include 'dbconnect.php';

/* latest recipes */
$recipesSql = mysql_query('SELECT title, id FROM recipes ORDER BY id DESC LIMIT 4 ');
$recipeResults = '';
while ($row = mysql_fetch_array($recipesSql)) {
	$recipeResults.= "<li><a href=\"/recipes.php?nav=recipes&recipeid=".$row['id']."\">".$row['title']."</a></li>";
}
/* top rated recipes */
$topRatedSql = mysql_query('SELECT rec.title, rec.id, ROUND(AVG (rat.rating)) AS rating FROM recipes rec INNER JOIN rating rat ON rec.id = rat.recipeid GROUP BY rat.recipeid ORDER BY rat.rating DESC LIMIT 4');
$topRatedResults = '';
while ($row = mysql_fetch_array($topRatedSql)) {
	$topRatedResults.= "<li><a href=\"/recipes.php?nav=recipes&recipeid=".$row['id']."\">".$row['title']."</a></li>";
}
/* quick and easy */
$quickEasySql = mysql_query('SELECT rec.id, rec.title FROM recipes rec INNER JOIN recipe_tags tag ON rec.id = tag.recipeid WHERE tag.tag_id = 1 ORDER BY rec.id DESC LIMIT 4');
$quickEasyResults = '';
while ($row = mysql_fetch_array($quickEasySql)) {
	$quickEasyResults.= "<li><a href=\"/recipes.php?nav=recipes&recipeid=".$row['id']."\">".$row['title']."</a></li>";
}
?>

<div id="accordion">		
	<h3><a href="#">Top Rated Recipes</a></h3>
	<div>
		<ul>
			<?=$topRatedResults;?>
		</ul>
	</div>		
	<h3>
		<a href="#">Latest Recipes</a>
	</h3>
	<div>
		<ul>
			<?=$recipeResults;?>
		</ul>
	</div>
	<h3><a href="#">Quick and Easy Recipes</a></h3>
	<div>
		<ul>
			<?=$quickEasyResults;?>
		</ul>
	</div>	
</div>