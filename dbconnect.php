<?

include('config.php');
$con = mysql_connect($dblink,$dbuser,$dbpass);
if(!$con)
    {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("$dbname", $con);

?>