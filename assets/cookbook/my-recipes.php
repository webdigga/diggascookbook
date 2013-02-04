<?

// database connect
require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');

$myRecSql =  mysql_query('SELECT rec.id, rec.title FROM recipes rec INNER JOIN members mem ON rec.userkey = mem.id WHERE mem.id = '.$_SESSION['id'].' ORDER BY rec.id DESC');

$recipe = '';
while ($row = mysql_fetch_array($myRecSql)) {
	$recipe.="<li><a class=\"recipe-title\" href=\"/recipes.php?recipeid=". $row['id'] ."\">". $row['title'] ."</a><span class=\"delete ui-icon ui-icon-closethick\" title=". $row['id'] ."\">Delete</span><a href=\"/cookbook.php?nav=cookbook&flag=edit&recipeid=". $row['id'] ."\"><span class=\"edit ui-icon ui-icon-pencil\">Edit</span></a></li>";
}

?>

<div id="my-recipes">
	<h2>My Recipes</h2>
	<ul>
		<?=$recipe;?>
	</ul>
	
	
	
	<div id="dialog-confirm" title="Delete Recipe">
		<p>
			<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 40px 0;"></span>
			This recipe will be permanently deleted and cannot be recovered. Are you sure?
		</p>
	</div>
	

</div>