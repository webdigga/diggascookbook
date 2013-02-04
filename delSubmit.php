<?

// CONNECT TO DATABASE

include('dbconnect.php');

//print_r($_POST);

$recId=(int)$_POST['delRecId'];
//echo $recId;

// DELETE RECEIPE FROM DATABASE
$sql="DELETE FROM comments WHERE recipeid=".$recId;
mysql_query($sql);

$sql2="DELETE FROM images WHERE recipeid=".$recId;
mysql_query($sql2);

$sql3="DELETE FROM ingredients WHERE recipeid=".$recId;
mysql_query($sql3);

$sql4="DELETE FROM preparation WHERE recipeid=".$recId;
mysql_query($sql4);

$sql5="DELETE FROM rating WHERE recipeid=".$recId;
mysql_query($sql5);

$sql6="DELETE FROM recipes WHERE id=".$recId;
mysql_query($sql6);

$sql7="DELETE FROM recipe_tags WHERE recipeid=".$recId;
mysql_query($sql7);







?>