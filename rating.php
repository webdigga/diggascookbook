<?

include('dbconnect.php');

//print_r($_POST);

$recipeid=$_POST['recipeid'];
$rating=$_POST['rating'];

mysql_query("INSERT INTO rating (recipeid, rating) VALUES ($recipeid, $rating)");

$result = mysql_query("SELECT ROUND(AVG (rating)) AS rating FROM rating WHERE recipeid = $recipeid");

while($row = mysql_fetch_array($result))
    {
    #echo $row['rating'];
    #echo "<br />";
    }

echo "Thank you for voting!";

?>