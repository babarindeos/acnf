<?php
require_once("conn.php");

if (isset($_POST['postarticle']))
{
  $subject = htmlspecialchars(addslashes(trim($_POST['subject'])));
  $subject = preg_replace('/\ /',' ',$subject);
  $subject = nl2br($subject);
  $message = htmlspecialchars(addslashes(trim($_POST['message'])));
  $message = preg_replace('/\ /',' ',$message);
  $message = nl2br($message);
  
  $createdby = $_SESSION['loginusername'];
  $reply = 0;
  $view = 0;
  
 //echo date("D, d M Y",strtotime(date()));
 $date =  date('Y-m-d H:i:s');
 
 if ($message !="" && $subject !="")
 {
	 $sql = "insert into topics(createdby,date,topic,message)values('$createdby','$date','$subject','$message')";
	 $result = mysql_query($sql);
	 
	 if(!$result)
	 {
	   echo "<div style='font-family:corbel;font-size:13px;color:#800000'><br><br><b>An Error has Occurred!</b><br>You are probably trying to submit a duplicate topic.</div>";
	 }
	 else
	 {
		 $flag = "succeed";
		  echo "<div style='font-family:corbel;font-size:13px;font-weight:bold;color:green;'><br><b>Topic has been successfully created.</b></div>";
	 }
 } 
 else
 {
	echo "<div style='font-family:corbel;font-size:13px;color:#800000'><br><br><b>An Error has Occurred!</b><br>Please supply subject and message for board topic.</div>"; 
 }
  
}

?>






<form name="form1" action="createtopic.php" method="post">
<table style="font-family:corbel;font-size:13px"><tr><td>
<p><br>
<span style="font-size:15px;font-weight:bold;color:#069">Create Board Topic</span></p>


  <strong>Subject</strong><br><input type="text" name="subject" size="80" maxlength="150"><br>
  <strong>Message</strong><br>
  <textarea cols="80" rows="10" name="message"></textarea>
  <br>
</p>
<div align='right'><input type="submit" name="postarticle" value="Post"></div>
</td></tr></table>
</form>

<br>
