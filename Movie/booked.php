<?
session_start();
?>
<?php
//$q=$_GET["q"];

$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("movie_booking", $con);
?>
<html>
<head>
<meta http-equiv="refresh" content="3; URL=main.php">
<body>
<p>
  <?
	$username=$_SESSION['myusername'];
	$movie = $_SESSION['movie'];
	$date = $_SESSION['date'];
	$stime = $_SESSION['stime'];
	$tname = 	$_SESSION['tname'];
	$seat = $_POST['seat'];
	$sql = "select * from theatre where theatre_name='$tname'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$tid = $row['theatre_id'];
	
	$sql = "select price from movie where movie_id='$movie' and theatre_id='$tid' and date='$date' and showtiming='$stime'";
	$result =mysql_query($sql);
	$row = mysql_fetch_array($result);
	$price = $row['price'];
	
	$sql = "Insert into booked (username,seat,movie_id,theatre_id,date,time,price) values ('$username','$seat','$movie','$tid','$date','$stime','$price')";
	$result = mysql_query($sql);
	if($result)
	{
		echo "Ticket booked succesfully";
	}

	$sql = "Update seats set status='booked' where seat=".$_POST['seat']." and movie_id='$movie' and theatre_id='$tid' and date='$date' and time='$stime'";
	$result = mysql_query($sql);
?>
</p>
</body>
</head>
</html>