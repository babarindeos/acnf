<?php
include("conn.php");

if (!(isset($_SESSION['selectedtopicid']) || ($_GET['id'])))
{
	header("location:index.php");
}
else
{
	if (isset($_GET['id']))
	{
		$_SESSION['selectedtopicid'] = trim(stripslashes(htmlspecialchars($_GET['id'])));
		
		$sname = trim(stripslashes(htmlspecialchars($_GET['sname'])));
		$fname = trim(stripslashes(htmlspecialchars($_GET['fname'])));
		$_SESSION['selectedtopiccreatedby'] = $sname.' '.$fname;
	}
}




$topicsid =  $_SESSION['selectedtopicid'];
$createdby = $_SESSION['selectedtopiccreatedby'];



    $sql = "select * from topics where topicsid='".$topicsid."' ";
	$result = mysql_query($sql);
	$numrecs = mysql_num_rows($result);
	
	
	
	
	if ($numrecs>0)
	{
		
	   $dbfield = mysql_fetch_assoc($result);
	   echo "<br><br><table width='80%' cellpadding='5' border='0' style='font-family:calibri;font-size:14px;' >";
	   echo "<tr><td style='border-bottom:1px solid #c1c1c1;'><font size='+1'>".$dbfield['topic']."</font><font color='#555555'><br>Posted by ".$createdby." on ".date("D, d M Y  G:i a",strtotime($dbfield['date']))."</font></td><tr>";
	   echo "<tr><td>".$dbfield['message']."</td></tr>";
	   
	   echo "</table>";
	   
	}

	
	
	
if (isset($_POST['postcomment']))
{
	$comment = trim(addslashes(htmlspecialchars($_POST['comment'])));
	
	if (empty($comment))
	{
		echo "<br><br><div  style='color:#800000;font-weight:bold;text-align:left;font-family:corbel;font-size:13px;'>Please enter some comments.</div>";  

	}
	else
	{
	   $submittedby = $_SESSION['loginusername']; ;
	   $date =  date('Y-m-d H:i:s');
	   
	   if (empty($submittedby) || empty($topicsid))
	   {
		   echo "<br><br><div  style='color:#800000;font-weight:bold;text-align:left;font-family:corbel;font-size:13px;'>An error has occurred. Please try and sign out and re-sign in.</div>"; 
	   }
	   else
	   {
		   $sqlinsertcomment = mysql_query("insert into comments(submittedby,date,comment,ontopicid)values('$submittedby','$date','$comment','$topicsid')");
		   
		   if ($sqlinsertcomment)
		   {
			    echo "<br><br><div  style='color:green;font-weight:bold;text-align:left;font-family:corbel;font-size:13px;'>Your comment has been posted.</div>";
		   }
	   }
	  
	   	
	}
}
 
//post comment textarea
?>
<br />
<font face="calibri,helvetica" size="2">
Post a Comment
<br />
<form method="post" action="boardtopic.php">
<textarea cols="80" rows="5" name="comment"></textarea><br />
<input type="submit" value="Post Comment" name="postcomment" />

</form>


<br /><br />
<font size="+1" color="#777777"><strong>Comments</strong></font>
<hr  size="1px" width='80%' align="left" color="#c1c1c1"/>

<?php
$sqlcomments = "SELECT topics.topicsid,comments.ontopicid,comments.commentsid as id,comments.submittedby as submittedby, comments.date as date, comments.comment as comment, members.surname as surname, members.firstname as firstname, members.othernames as othernames
FROM comments
INNER JOIN members ON comments.submittedby = members.email INNER JOIN topics ON topics.topicsid=".$topicsid." and topics.topicsid=comments.ontopicid order by comments.commentsid desc";
$querycomments = mysql_query($sqlcomments);
echo "<table width='80%' cellpadding='2px' cellspacing='0px'>";
$counter = 2;
while($dbcomments = mysql_fetch_assoc($querycomments))
{
	$shade = $counter%2;
	
	
	echo "<tr>";
	
	
	if($shade)
	{
	  echo "<td bgcolor='#e1e1e1' style='font-family:corbel,calibri;font-size:13px;'>";
	  echo '<strong>'.$dbcomments['surname'].' '.$dbcomments['firstname'].' '.$dbcomments['othernames']."</strong><br><em>Posted on ".date("D, d M Y  G:i a",strtotime($dbfield['date'])). "</em><br><br>";
	  
	  echo nl2br(trim(stripslashes($dbcomments['comment'])));
	}
	else
	{
	   echo "<td style='font-family:corbel,calibri;font-size:13px'>";
	   echo '<strong>'.$dbcomments['surname'].' '.$dbcomments['firstname'].' '.$dbcomments['othernames']."</strong><br><em>Posted on ".date("D, d M Y  G:i a",strtotime($dbcomments['date'])). "</em><br><br>";
	   echo nl2br(trim(stripslashes($dbcomments['comment'])));
	}
	
	
	echo "<br><br></td>";
	echo "</tr>";
	$counter++;
	if ($counter>3)
	{
	 $counter = 2;	
	}
	
}
echo "</table>";
?>

<br /><br /><br />
</font>
