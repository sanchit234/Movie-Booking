
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
session_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="movie_booking"; // Database name 
// Connect to server and select databse.
 mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$username =$_SESSION['myusername'];
$sql= "select * from users_tbl where username='$username' and userlevel='9'"; 
$result = mysql_query($sql);
if($row = mysql_fetch_array($result))
  {
  }
  else
    header("location:logout.php");
?>
<?
session_start();
if(!$_SESSION['myusername']){
header("location:main.php");
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  ?> [<a href="first.php">Main Page</a>] [<a href="logout.php">Logout</a>] </p><p align="left"> </p><p align="left"><?php
$username = $_SESSION['myusername'];
echo "Welcome $username";
?></p>
<p>
<fieldset>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form2" method="post" action="insertmovie.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><p>&nbsp;</p>
  <p><strong> Insert Movie</strong></p></td>
</tr>
<tr>
<td width="208">Movie Id</td>
<td width="6">:</td>
<td width="294"><input name="movieid" type="text" id="movieid"></td>
</tr>
<tr>
<td>Movie Name</td>
<td>:</td>
<td><input name="moviename" type="text" id="moviename"></td>
</tr>
<tr>
<td>Theatre Id</td>
<td>:</td>
<td><input name="tid" type="text" id="tid"></td>
</tr>
<tr>
<td>City Id</td>
<td>:</td>
<td><input name="cid" type="text" id="cid"></td>
</tr>
<tr>
<td>Date</td>
<td>:</td>
<td><input name="date" type="text" id="date"></td>
</tr>
<tr>
<td>Show Timing</td>
<td>:</td>
<td><input name="st" type="text" id="st"></td>
</tr>
<tr>
<td>Price</td>
<td>:</td>
<td><input name="price" type="text" id="price"></td>
</tr>
<tr>
<td>Status</td>
<td>:</td>
<td><select name="status" id ="status">
<option value="Now Showing">Now Showing</option>
<option value="Next Change">Next Change</option>
<option value="Coming Soon">Coming Soon</option></select></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Insert Movie"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</fieldset>
</p>
<p>
<fieldset>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form2" method="post" action="deletecity.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><p>&nbsp;</p>
  <p><strong> Delete City</strong></p></td>
</tr>
<tr>
<td>City Name</td>
<td>:</td>
<td><input name="city" type="text" id="city"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Delete"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</fieldset>
</p>
<p>
<fieldset>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form2" method="post" action="deletetheatre.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><p>&nbsp;</p>
  <p><strong>Remove Theatre</strong></p></td>
</tr>
<tr>
<td>Theatre</td>
<td>:</td>
<td><input name="theatre" type="text" id="theatre"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Delete"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</fieldset>
</p>
<p>
<fieldset>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form2" method="post" action="makeadmin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><p>&nbsp;</p>
  <p><strong>Make Admin</strong></p></td>
</tr>
<tr>
<td>Username</td>
<td>:</td>
<td><input name="user" type="text" id="user"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Make Admin"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</fieldset>
</p>

  </div>
    </center>
</body>
</html>