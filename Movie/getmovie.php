<?
session_start();
?>
<?php

echo $city= $_GET["q"];
$city = stripslashes($city);
session_register("city");
$_SESSION['city']=$city;
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("movie_booking", $con);

$sql="SELECT * FROM movie WHERE city_id = '".$city."' and status='Now Showing' group by movie_name";

$result = mysql_query($sql);

	 echo "<select name ='movie' id ='movie' onchange=\"showdate(this.value)\">";
	 echo "<option value=\"\">--Select Movie--</option>";
while($row = mysql_fetch_array($result))
  {
	 echo "<option value=".$row['movie_id'].">".$row['movie_name']." </option> ";

  }
		echo "</select>";


mysql_close($con);
?>