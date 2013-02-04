<?

include 'dbconnect.php';

//query the database  
$query = mysql_query("SELECT tags.tag, count(tags.tag) as frequency, rectag.tag_id FROM recipe_tags rectag INNER JOIN tags ON rectag.tag_id = tags.id INNER JOIN recipes rec ON rec.id = rectag.recipeid GROUP BY tags.tag");
		
//start json object  
$json = "({ tags:[";   
		
//loop through and return results  
for ($x = 0; $x < mysql_num_rows($query); $x++) {  
	$row = mysql_fetch_assoc($query);  
				
	//continue json object  
	$json .= "{tag:'" . $row["tag"] . "',freq:'" . $row["frequency"] . "',tagid:'" . $row["tag_id"] . "'}";  
				
	//add comma if not last row, closing brackets if is  
	if ($x < mysql_num_rows($query) -1)  
		$json .= ",";  
	else  
		$json .= "]})";  
}  
		
//return JSON with GET for JSONP callback  
$response = $_GET["callback"] . $json;  
echo $response;



?>