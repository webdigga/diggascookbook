<?

include 'dbconnect.php';

// get the tag id
if (isset($_GET['tag'])) {
	$tagId = $_GET['tag'];
} else {
	$tagId = 0;
}

// get the data
if ($tagId != 0) {
	/* tagged content */
	$tagSql = mysql_query('SELECT rec.id, rec.title, rec.description, ROUND(AVG (rat.rating)) AS rating FROM recipes rec INNER JOIN recipe_tags tag ON rec.id = tag.recipeid LEFT JOIN rating rat ON rec.id = rat.recipeid WHERE tag.tag_id = '.$tagId.' GROUP BY rec.title ORDER BY rat.rating DESC');
	$tagResults = '';
	
	while ($row = mysql_fetch_array($tagSql)) {
		$stars = '';
		// build the stars
		for ($i=1; $i<=$row['rating']; $i++) {
			$stars.="<div class=\"star-rating star-rating-on\"><a></a></div>";
		}
		if ($stars==='') {
			$stars = 'Not yet rated';
		}
	
		$tagResults.= "<tr><td class=\"title\"><a href=\"/recipes.php?recipeid=".$row['id']."\">".$row['title']."</a></td><td class=\"description\">".$row['description']."</td><td>".$stars."</td></tr>";
	}
}	else {
	$tagResults = '<tr><td>Sorry, no results were returned, please try another tag from the cloud or pick a recipe from the search box</td><td>&nbsp;</td></tr>';
}
?>

<table border="0" id="results-table">
	<thead>
		<th>Recipe</th>
		<th>Description</th>
		<th>Rating</th>
	</thead>
	<tbody>
		<?=$tagResults;?>
	</tbody>
</table>