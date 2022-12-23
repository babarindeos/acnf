<?php
$email = stripslashes(htmlspecialchars($_GET['email']));
$code = stripslashes(htmlspecialchars($_GET['activate']));
if (empty($email) || empty($code))
{
	header("location:index.php");
}
else
{
	
	$sql = "select * from members where email='".$email."' and activatecode='".$code."' and activated=''";
	$query = mysql_query($sql);
	$nums = mysql_num_rows($query);
	
	
    if ($nums)
	{
	  $sqlupdate = "update members set activated='1' where email='".$email."' and activatecode='".$code."'";
	  $query = mysql_query($sqlupdate);
	  header("location:accountactivated.php");	
	}
	else
	{
	  header("location:index.php");
	}
	
}


?>