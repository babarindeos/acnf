<?php
session_start();
include("conn.php");
$errmsg = "";
$flag ="";
if (isset($_POST['signup']))
{
$title =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['title'])))));
$surname =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['surname'])))));
$firstname =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['firstname'])))));
$othernames =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['othernames'])))));
$country =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['country'])))));
$city =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['city'])))));
$profession =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['profession'])))));
$phone =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['phone'])))));
$emailid =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['emailid'])))));
$pass =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['pass'])))));
$confirmpass =  trim(htmlspecialchars(htmlentities(strip_tags(stripslashes($_POST['confirmpass'])))));


if ($emailid=="" || $title=="" || $surname=="" || $othernames=="" || $country=="" || $city=="" || $profession=="" || $phone=="" ||$pass=="" || $confirmpass=="")
{
 $errmsg = "Ensure to fill all fields before submitting...";
}
else
{
	$sqlcheck = "select email from members where email='".$emailid."'";
	$querycheck = mysql_query($sqlcheck);
	if (mysql_num_rows($querycheck))
	{
		$errmsg.="<br>That email address already applied and has been sent a mail for activation";
	}
}

if (!empty($_POST['emailid']))
{
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailid)){ 
	 $errmsg = $errmsg."<br>Please supply a valid email address";
    }
}

if($pass!=$confirmpass){
  $errmsg = $errmsg."<br>Password mismatch";	
}
else
{
	$passcount = strlen($pass);
	if ($passcount<=6)
	{
	  $errmsg = $errmsg."<br>Password must not be less than six characters.";	
	}
}

	
if($errmsg=="")
{
   $activatecode = "";
	if (filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
	  for ($i=0;$i<60;$i++)
	  {
	      $int = rand(0,51);
		  //echo "[".$int."]";
          $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		  $rand_letter = $a_z[$int];
		  $activatecode = $activatecode.$rand_letter;
		 // echo $activatecode;
		  //echo "<br>";
	  }
	
	  //echo $activatecode;
	  
	  $mydate = date("Y-m-d");
	  $sql = "insert into members(title,surname,firstname,othernames,country,city,profession,phone,email,password,activatecode,date)values('$title','$surname','$firstname','$othernames','$country','$city','$profession','$phone','$emailid','$pass','$activatecode','$mydate')";
	  $query = mysql_query($sql) or die(mysql_error());
	  
		  if ($query)
		  {
		    include("regmailnotice.php"); 
			
		  }
		  else
		  {
		     $errmsg = $errmsg."<br>An error has occurred registering your information.<br>". $emailid." might probably have been registered.";
		  }
	  
	} else {
	  $errmsg = $errmsg."<br>Invalid email address";
	}
}






}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="mainstylesheet.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>African Caribbean Network (ACN)</title>
<script language="javascript">
<!-- hide from old browsers
slidemage1= new Image(946,218); 
slidemage1.src="slideimages/bnr2.jpg"; 
slidemage2= new Image(946,218); 
slidemage2.src="slideimages/bnr3.jpg"; 																																																																																															
slidemage3= new Image(946,218); 
slidemage3.src="slideimages/bnr4.jpg"; 
//-->
</script>
<style type="text/css">
body {
	margin-top: 0px;
}
</style>
</head>

<body onload="slide();" bgcolor="#999999">
<table width="948" border="0" align="center" bgcolor="#FFFFFF" cellpadding="1px">
  <tr>
    <td>
    <?php
	 include("header.php");
	
	?>
    
    </td>
  </tr>
  <tr><td>
  <?php
  include("imageslider.php");
  include("tradeinvestmentbar.php");
  ?>
  
  </td></tr>
  <tr><td>
  <?php
  include("signupcompleted_content.php");
  
  ?>
  
  </td></tr>
  <tr><td>
  <?php
  
  include("footer.php");
  ?>
  </td></tr>
</table>
</body>
</html>