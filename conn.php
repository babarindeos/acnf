<?php
$server = "localhost";
$username = "root";
$password = "guitars";
$database = "acnfoundation";

$dbhandler = @mysql_connect($server,$username,$password) or die("<font style='font-family:verdana;font-size:11px;'><h2>An Error has Occurred Coonecting to Web Server!</h2>Please contact the site administrator.</font>");

$dbfound = mysql_select_db($database,$dbhandler);

if ($dbfound)
{
  //echo "connected";
}
else
{
 echo "<font style='font-family:verdana;font-size:11px;'><h2>An Error has occurred connecting to Database Server</h2> Please contact the site administrator.</font>";
 exit;
}

?>