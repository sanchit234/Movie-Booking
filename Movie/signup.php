<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="movie_booking"; // Database name 
$tbl_name="users_tbl"; // Table name
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];
$mypassword2=$_POST['mypassword2'];
$myemail=$_POST['myemail'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$mypassword2 = stripslashes($mypassword2);
$myemail = stripslashes($myemail);
$myusername = mysql_real_escape_string($myusername);
$mypassword = md5($mypassword);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword2 = md5($mypassword2);
$mypassword2 = mysql_real_escape_string($mypassword2);
$myemail = mysql_real_escape_string($myemail);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($mypassword!="" && $mypassword!="" && $mypassword2!="" && $myemail!="")
{
if($count==1){echo "User already exist";}
else {
	if($mypassword==$mypassword2)
	{
			$sql="Insert into $tbl_name (username,password,email,userlevel) values ('$myusername','$mypassword','$myemail',1)";
			$result=mysql_query($sql);
			echo "Sing Up Succesfull<br><br>";
			session_register("myusername");
			session_register("mypassword");
			header("location:first.php");
	}
	else
		echo "Passwords don't match";
}
}
else
{
	echo "One or more fields are empty";
}
ob_end_flush();
?>


