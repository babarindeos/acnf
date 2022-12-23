<p><span style="font-size:18px;font-weight:bold;color:#069">
<br>Join and be a contributing member of our online community. <br /><br /></span></p>
    <?php
	$errmsg = "";
	if (isset($_POST['submit1']))
	{
		$email = trim(htmlspecialchars(stripslashes($_POST['email'])));
		$pass = trim(htmlspecialchars(stripslashes($_POST['pass'])));
	
	if (empty($email) || empty($pass))
	{
	  echo "<div style='font-family:corbel;color:#800000;font-weight:bold;text-align:left;'>Invalid email or password</div><br>";	
	}
	else
	{
	  include("conn.php");
	  $sql = "select * from members where email='".$email."' and password='".$pass."' and activated='1'";
	  $query = mysql_query($sql);	
	  $numrows = mysql_num_rows($query);
	  if ($numrows)
	  {
		  
		  $db = mysql_fetch_assoc($query);
		  $_SESSION['loginusername'] = $db['email'];
		  $_SESSION['surname'] = $db['surname'];
		  $_SESSION['firstname'] = $db['firstname'];
		  $_SESSION['othernames'] = $db['othernames'];
		  header("location:index.php");
		  
	  }
	  else
	  {
		echo "<div  style='color:#800000;font-weight:bold;text-align:right;'>Unauthorised login credentials</div>";  
		
	  }
	  
	}
	
		
	}
	
	
	
	if (isset($_SESSION['loginusername']))
	{
		echo "<div align='right'><br><b>Welcome, ".$_SESSION['surname'].' '.$_SESSION['firstname'].' '.$_SESSION['othernames']." | <a href='logout.php'>Sign out</a></b><br><br></div>";
	}
	else
	{
	
	?>
    <form method="post" action="registerlogin.php">
    <span style="font-family:corbel;font-size:13px;font-weight:bold;color:#000000;">Already a member, login now.</span>
   <table width="100%">
   <tr><td align="left">
    <table style="font-family:corbel;font-size:14px;"><tr><td>Email</td><td><input type="text" name="email"></td></tr>
    <tr><td>Password</td><td><input type="password" name="pass"></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="submit1" value="Login" style="background-color:#069;color:white;"></td>
    </tr>
    </table>
    
    
    <div align="left" style="font-size:13px;font-family:corbel;"><a href="signup.php">Sign up</a> | forgot my password</div>
    </td></tr></table>
    </form>
    <br>
 
 <?php
	}
	
?>