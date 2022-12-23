
<link href="mainstylesheet.css" rel="stylesheet" type="text/css" />
<body>
<table width="946" border="0">
  <tr>
    <td width="663" valign="top" style="font-family:corbel;font-size:14px;padding:5px;border-right:1px solid #f1f1f1;">
    <a name="signup"></a>
    <p><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:20px;color:#069;font-weight:bold;">Membership Sign Up</span>
    <hr size="1px" color="#CCCCCC">
      <p>
      
      <?php
	    if (isset($_POST['signup']))
		{
			if ($errmsg=="")
			{
			  if ($flag=='sent' && $alreadysent==1)
			  {
				echo "<br><font color='green'><strong>You had already applied for membership and a mail had been sent to you. If you cannot locate the activation mail in your inbox, check your bulk/spam. <br><br>Another message has just been sent to your email to activate your account.<br>Thank you for registering with us.</strong></font><br><br>";
				   
			  }
			  else if ($flag=='sent')
			  {
				  echo "<br><font color='green'><strong>A message has been sent to your email to activate your account.<br>Thank you for registering with us.</strong></font><br><br>";
			  }
			  
			}
			else
			{
			   echo "<font color='#800000'><strong>".$errmsg."</strong></font>";	
			   echo "<br>";	
			}
		
		
		}
			  
	  ?>
      
      <form method="post" action="signup.php" enctype="multipart/form-data">
      <table width="100%"><tr><td width="25%">
      Title
      
     </td><td>
      
      <input type="text" name="title" size="20px" maxlength="40" required value="<?php if(isset($_POST['signup'])){echo $title;}?>">
      
      
      </td>
      <td rowspan="9" valign="top">&nbsp;</td>
      
      
      </tr>
        <tr>
          <td>Surname</td>
          <td><input type="text" name="surname" size="40px" maxlength="40" required value="<?php if(isset($_POST['signup'])){echo $surname;}?>"></td>
        </tr>
        <tr>
          <td>Firstname</td>
          <td><input type="text" name="firstname" size="40px" maxlength="40" required value="<?php if(isset($_POST['signup'])){echo $firstname;}?>"></td>
        </tr>
        <tr>
          <td>Othernames</td>
          <td><input type="text" name="othernames" size="40px" maxlength="40" required value="<?php if(isset($_POST['signup'])){echo $othernames;}?>"></td>
        </tr>
        <tr>
          <td>Country</td>
          <td>
          
          <?php
		  $sql = "select * from countries";
		  $query = mysql_query($sql);
		  echo "<select name='country'>";
		  echo "<option></option>";
		  while ($dbfield = mysql_fetch_assoc($query))
		  {
           echo "<option value='".$dbfield['country_code']."'>".$dbfield['country_name']."</option>";
		  }
		  
		  echo "</select>";
		  ?>
          
          
          </td>
        </tr>
        <tr>
          <td>City</td>
          <td><input type="text" name="city" size="40px" maxlength="40" required value="<?php if(isset($_POST['signup'])){echo $city;}?>"></td>
        </tr>
        <tr>
          <td>Profession</td>
          <td><input type="text" name="profession" size="40px" maxlength="40" required value="<?php if(isset($_POST['signup'])){echo $profession;}?>"></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><input type="text" name="phone" size="40px" maxlength="40" required value="<?php if(isset($_POST['signup'])){echo $phone;}?>"></td>
        </tr>
        <tr>
          <td>email</td>
          <td><input type="text" name="emailid" size="40px" maxlength="40" required value="<?php if(isset($_POST['signup'])){echo $emailid;}?>"></td>
        </tr>
         <tr>
          <td>Password</td>
          <td><input type="password" name="pass" size="40px" maxlength="40" required></td>
        </tr>
         <tr>
          <td>Confirm password</td>
          <td><input type="password" name="confirmpass" size="40px" maxlength="40" required></td>
        </tr>
        
        <tr>
          <td colspan="3" align="center"><input type="submit" name="signup" value="Submit"><input type="reset" name="reset1"value="Cancel"></td>
          </tr>
      </table>
  </form>    
      
   
      
      </p>
<hr size="1px" color='#e1e1e1'>
  <p>
  
 </p></td>
    <td width="267" valign="top"  style="font-family:corbel;font-size:14px;"><div align="right"><img src="images/facebooktwitter.png" width="80" height="43" alt="socialmedia"></div>
    <br>
    <p><br>
  </p>
  <p><br>
  </p></td>
  </tr>
</table>
</body>
