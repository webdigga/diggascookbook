<?

// MAKE DATABASE CONNECTION
include('dbconnect.php');

$recipeid=$_POST['recipeid'];
$commenttext=$_POST['comment-input'];
$uid=$_POST['userkey'];

mysql_query("INSERT INTO comments (recipeid, comment, datetime, userkey) VALUES ($recipeid, '$commenttext', now(), $uid)");

$comments = mysql_query("SELECT comment, datetime, mem.firstname AS firstname, mem.surname AS surname FROM comments com INNER JOIN recipes rec ON rec.id = com.recipeid INNER JOIN members mem ON mem.id = com.userkey WHERE rec.id=$recipeid ORDER BY datetime DESC LIMIT 4");

$commentstable = '';
    
while($row = mysql_fetch_array($comments)){       
	$time=$row['datetime'];		
	$firstname=ucfirst($row['firstname']);
	$surname=ucfirst($row['surname']);
	$commentsname = $firstname."&nbsp;".$surname;
	$formattedDate= date("D G:i", strtotime($time));           
	$commentstable.="<p>".$row['comment']."<span>Comment by: ".$commentsname."</span><span>".$formattedDate."</span></p>";
}
    
echo $commentstable;

?>