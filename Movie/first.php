<?
session_start();
if(!$_SESSION['myusername']){
header("location:main.php");
}
?>
<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="movie_booking"; // Database name 
// Connect to server and select databse.
 mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
function showmovie(str)
{
if (str=="")
  {
  document.getElementById("movie").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("movie").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getmovie.php?q="+str,true);
xmlhttp.send();
}


function showdate(str)
{
if (str=="")
  {
  document.getElementById("date").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("date").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getdate.php?q="+str,true);
xmlhttp.send();
}
</script>
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
  ?> [<a href="logout.php">Logout</a>]</p><p align="left"><?php
$username = $_SESSION['myusername'];
echo "Welcome $username";
?></p>
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form1" method="post" action="schedule.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td width="78">City</td>
<td width="6">:</td>
<td width="294">
<select name ='city' id = 'city' onchange="showmovie(this.value)">
<option value="">--Select City--</option>
<?php $tbl_name="city"; // Table name ?>
<?php $result= mysql_query("SELECT * FROM $tbl_name"); ?> 
    <?php while($row= mysql_fetch_assoc($result)) { ?> 
        <option value="<?php echo $row['city_id'];?>"> 
            <?php echo $row['city_name']; ?> 
        </option> 
    <?php } ?>
</select>
</td>
</tr>
<tr>
<td>Movie</td>
<td>:</td>
<td>
<select name ='movie' id = 'movie' onchange="showdate(this.value)"></select>
</td>
</tr>
<tr>
<td>Date</td>
<td>:</td>
<td><select name ='date' id = 'date'></select>
</tr>
<tr>
<td></td>
<td></td>
<td><input name="submit" type="Submit" value="See Shows" />
</tr>
</table>
</td>
<? /*
$city= $row['city_name'];
$movie= $_POST['movie'];
$date = $_POST['date'];
$city = stripslashes($city);
$movie = stripslashes($movie);
$date = stripslashes($date);
session_register("city");
session_register("movie");
session_register("date");*/
?>
</form>
</tr>
</table> 

  </div>
    </center>
</body>
</html>