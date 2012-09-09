
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
session_start();
$city= $_POST['city'];
$movie= $_POST['movie'];
$date = $_POST['date'];
$city = stripslashes($city);
$movie = stripslashes($movie);
$date = stripslashes($date);
session_register("city");
session_register("movie");
session_register("date");
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
<title>Book Ur Show</title>
<style type="text/css">
a:link {
	color:#ffffff;
	text-decoration: underline;
}
a:visited {
	color: #ffffff;
	text-decoration: underline;
}
html, body {height:100%; margin:0; padding:0;}

#page-background {position:fixed; top:0; left:0; width:100%; height:100%;}
#content {position:relative; z-index:1; padding:10px;}
</style>

</head>

<body>

<div id="page-background"><img src="images/main%20baclground.jpg" width="100%" height="100%" alt="Smile"></div>
<center>
<div class="container" style="width:800px" id="content">
  <div class="header"><img src="images/logo.png" width="177" height="61" longdesc="main.php" />                              	<!-- end .header --></div>
<center>
  <div class="content" style="background-image:url(); height:427px; color: #FFF;">
	<p align="right"><?php  $username = $_SESSION['myusername'];
  $sql= "select * from users_tbl where username='$username' and userlevel='9'"; 
  $result = mysql_query($sql);
  if($row = mysql_fetch_array($result))
  {
	  echo "[<a href=\"admin.php\">Admin Center</a>]";
  }
  ?> [<a href="first.php">Main Page</a>] [<a href="logout.php">Logout</a>]</p><p align="left"><?php
$username = $_SESSION['myusername'];
echo "Welcome $username";
?></p>
  <form name="form1" action="book.php" method="post">
  <table width="200" border="0">
  <tr>
    <td>City</td>
    <td><input name="city" type="text" id="city" readonly="true" style="background-color:#000; color:#FFF" value="<? $sql="Select * from city where city_id='$city'";$sqlresult=mysql_query($sql);$row = mysql_fetch_array($sqlresult);$cityname=$row['city_name'];echo $cityname;?>" /></td>
  </tr>
  <tr>
    <td>Movie</td>
    <td><input name="movie" type="text" id="movie" readonly="true" style="background-color:#000; color:#FFF" value="<? $sql="Select * from movie where movie_id='$movie'" ;$sqlresult=mysql_query($sql);$row = mysql_fetch_array($sqlresult);$moviename=$row['movie_name'];echo $moviename;?>" />	</td>
  </tr>
  <tr>
    <td>Date</td>
    <td><input name="date" type="text" id="date" readonly="true" style="background-color:#000; color:#FFF" value="<? $sql="Select * from movie where date='$date' and movie_id='$movie' and city_id='$city'";$sqlresult=mysql_query($sql);$row = mysql_fetch_array($sqlresult);$date2=$row['date'];echo $date2;?>" /></td>
  </tr>
</table>
  <?php
  	echo "<br><br>";
  	$sql = "Select theatre_id,showtiming from movie where movie_id='$movie' and city_id='$city' and date='$date'";
	$result = mysql_query($sql);
	echo "<table>";
	echo "<tr>
		<td width=\"100px\">Theatre</td>
		<td width=\"100px\">Show Timing</td>
		<td width=\"100px\">Book Ticket</td></b>
		</tr>";
	while($row = mysql_fetch_array($result))
	{
		  echo "<form name=\"form1\" action=\"book.php\" method=\"post\">";
			$sql2 = "Select theatre_name from theatre where theatre_id=".$row['theatre_id']."";
			$result2 = mysql_query($sql2);
			$row2 = mysql_fetch_array($result2);
			$tname = $row2['theatre_name'];
			$stime = $row['showtiming'];
			echo "<tr>
			<td><input name=\"tname\" type=\"text\" id=\"tname\" readonly=\"true\" style=\"background-color:#000; color:#FFF\" value='$tname'/></td>
			<td><input name=\"stime\" type=\"text\" id=\"stime\" readonly=\"true\" style=\"background-color:#000; color:#FFF\" value='$stime'/></td>
			<td align=\"center\"><input name=\"book\" type=\"submit\" value=\"Book\" /></td>
			</tr>";
			echo "</form>";
	}
	echo "</table>";
  ?>
  </form>
  </div>
    </center>
 
</body>
</html>