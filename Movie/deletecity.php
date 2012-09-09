<?php
session_start();
?>
<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("movie_booking", $con);
?>
<?
	$city = $_POST['city'];
	?>
<?
	 $sql = "Delete from city where city_name='$city'";
	 $result = mysql_query($sql);
	 if($result)
	 {
		 echo "City Removed From Database<br>";
	 }
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>