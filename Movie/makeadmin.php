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
	$user = $_POST['user'];
	?>
<?
	$sql = "select * from users_tbl where username='$user'";
	$result= mysql_query($sql);
	$num = mysql_numrows($result);
	if(	$num==0)
	{
		echo "No such user exist";
	}
	else
	{
	 $sql = "Update users_tbl set userlevel='9' where username='$user'";
	 $result = mysql_query($sql);
	 if($result)
	 {
		 echo "Selected user was made admin<br>";
	 }
	}
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>