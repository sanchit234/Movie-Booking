<?
session_start(); 
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Ur Show</title>
<style type="text/css">
html, body {height:100%; margin:0; padding:0;}

#page-background {position:fixed; top:0; left:0; width:100%; height:100%;}
#content {position:relative; z-index:1; padding:10px;}

#
</style>

</head>

<body>
<div id="page-background"><img src="images/main%20baclground.jpg" width="100%" height="100%" alt="Smile"></div>
<center>
<div class="container" style="width:800px" id="content">
  <div class="header"><img src="images/logo.png" width="177" height="61" longdesc="main.php" />                              	<!-- end .header --></div>
<center>
  <div class="content" style="background-image:url(); height:427px; color: #FFF;vertical-align:middle">
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table> 

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form2" method="post" action="signup.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><p>&nbsp;</p>
  <p><strong> Sign Up Here</strong></p></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Enter Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>Confirm Password</td>
<td>:</td>
<td><input name="mypassword2" type="password" id="mypassword2"></td>
</tr>
<tr>
<td>Email id</td>
<td>:</td>
<td><input name="myemail" type="text" id="myemail"></td>
</tr>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Sign Up"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

  </div>
    </center>
  </center>
</body>
</html>